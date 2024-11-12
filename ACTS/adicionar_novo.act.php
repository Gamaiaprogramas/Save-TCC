<?php
session_start();
require('../ACTS/connect.php');
extract($_POST);
$msg = "";

$destino = "location:../PAGES/dashboard.php";

// Consulta para verificar se já existem dívidas cadastradas para o usuário
$busca = mysqli_query($con, "SELECT `Nomes_Dividas`, `Valores_Dividas`, `Tempo_Dividas`, `Juros_Dividas` FROM `informacao` WHERE `Id_User` = '$_SESSION[Id_user]'");

if ($busca->num_rows > 0) {
    // Se dívidas já existirem, faça o UPDATE
    $dadosAtuais = $busca->fetch_assoc();

    // Substituição apenas para dívidas marcadas como ilimitadas
    $tempos = $_POST['tempo'];
    if (isset($_POST['tempo_ilimitada'])) {
        foreach ($_POST['tempo_ilimitada'] as $key => $ilimitada) {
            if ($ilimitada === '9999') {
                $tempos[$key] = 9999;
            }
        }
    }
    $_SESSION['tempo'] = $tempos;

    // Concatena os novos valores com os valores existentes
    $dividasStr = $dadosAtuais['Nomes_Dividas'] . ',' . implode(',', $dividas);
    $valoresStr = $dadosAtuais['Valores_Dividas'] . ',' . implode(',', $valores);
    $jurosStr = $dadosAtuais['Juros_Dividas'] . ',' . implode(',', $juros);
    $temposStr = $dadosAtuais['Tempo_Dividas'] . ',' . implode(',', $tempos);

    $query = "UPDATE `informacao` 
              SET `Nomes_Dividas` = ?, `Valores_Dividas` = ?, `Tempo_Dividas` = ?, `Juros_Dividas` = ? 
              WHERE `Id_User` = ?";
    
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "ssssi", $dividasStr, $valoresStr, $temposStr, $jurosStr, $_SESSION['Id_user']);

        if (mysqli_stmt_execute($stmt)) {
            $msg = "<p class=\"alerta green\">Informações atualizadas com sucesso!</p>";
            $_SESSION['divida'] = 1;
        } else {
            $msg = "<p class=\"alerta red\">Erro ao atualizar informações: " . mysqli_error($con) . "</p>";
            $destino = "location:../PAGES/dashboard.php";
        }

        mysqli_stmt_close($stmt);
    } else {
        $msg = "<p class=\"alerta red\">Erro ao preparar a query: " . mysqli_error($con) . "</p>";
        $destino = "location:../PAGES/dashboard.php";
    }

} else {
    // Se não há dívidas existentes, insere como novo registro
    $tempos = $_POST['tempo'];
    if (isset($_POST['tempo_ilimitada'])) {
        foreach ($_POST['tempo_ilimitada'] as $key => $ilimitada) {
            if ($ilimitada === '9999') {
                $tempos[$key] = 9999;
            }
        }
    }
    $_SESSION['tempo'] = $tempos;

    if (isset($_SESSION['tempo'], $_SESSION['saldo'], $_SESSION['Id_user'], $_SESSION['nivelDivida'])) {
        $tempos = $_SESSION['tempo'];
        $saldo = floatval($_SESSION['saldo']);
        $user_id = $_SESSION['Id_user'];
        $nivelDivida = $_SESSION['nivelDivida'];

        if (empty($dividas) || empty($valores) || empty($juros) || empty($tempos) || empty($saldo) || empty($user_id)) {
            $msg = "<p class=\"alerta red\">Preencha todos os campos!</p>";
            $_SESSION['msg'] = $msg;
            $destino = "location:../PAGES/dashboard.php";
            header($destino);
            exit();
        }

        $dividasStr = implode(',', $dividas);
        $valoresStr = implode(',', $valores);
        $jurosStr = implode(',', $juros);
        $temposStr = implode(',', $tempos);

        $query = "INSERT INTO `informacao` (`saldo`, `Nomes_Dividas`, `Valores_Dividas`, `Tempo_Dividas`, `Juros_Dividas`, `Id_User`, `nivel`) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        if ($stmt = mysqli_prepare($con, $query)) {
            mysqli_stmt_bind_param($stmt, "sssssis", $saldo, $dividasStr, $valoresStr, $temposStr, $jurosStr, $user_id, $nivelDivida);

            if (mysqli_stmt_execute($stmt)) {
                $msg = "<p class=\"alerta green\">Informações salvas com sucesso</p>";
                $_SESSION['divida'] = 1;
            } else {
                $msg = "<p class=\"alerta red\">Erro ao salvar informações: " . mysqli_error($con) . "</p>";
                $destino = "location:../PAGES/dashboard.php";
            }

            mysqli_stmt_close($stmt);
        } else {
            $msg = "<p class=\"alerta red\">Erro ao preparar a query: " . mysqli_error($con) . "</p>";
            $destino = "location:../PAGES/dashboard.php";
        }
    } else {
        $msg = "<p class=\"alerta red\">Dados insuficientes para salvar </p>";
        $destino = "location:../PAGES/dashboard.php";
    }
}

$_SESSION['msg'] = $msg;
header($destino);
?>
