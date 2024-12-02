<?php
session_start();
require('../ACTS/connect.php');
extract($_POST);
$msg = "";

$destino = "location:../ACTS/gastos.act.php";

// Consulta para verificar se já existem dívidas cadastradas para o usuário
$busca = mysqli_query($con,"SELECT `Nomes_Dividas` FROM `informacao` WHERE `Id_User` = '$_SESSION[Id_user]'");

if ($busca->num_rows == 0) {
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

    if (isset($_SESSION['tempo'], $_SESSION['saldo'], $_SESSION['Id_user'], $_SESSION['nivelDivida'])) {
        $tempos = $_SESSION['tempo'];
        $saldo = floatval($_SESSION['saldo']);
        $user_id = $_SESSION['Id_user'];
        $nivelDivida = $_SESSION['nivelDivida'];

        // Validação para evitar campos vazios
        if (empty($dividas) || empty($valores) || empty($juros) || empty($tempos) || empty($saldo) || empty($user_id)) {
            $msg = "<p class=\"alerta red\">Preencha todos os campos!</p>";
            $_SESSION['msg'] = $msg;
            $destino = "location:../PAGES/adicaoDivida.php";
            header($destino);
            exit();
        }

   
        // Convertendo arrays para strings separadas por vírgulas
        $dividasStr = implode(',', $dividas);
        $valoresStr = implode(',', $valores);
        $jurosStr = implode(',', $juros);
        $temposStr = implode(',', $tempos);
        $tempoStrFix = implode(',' , $tempos);

        
         $query = "INSERT INTO `informacao` (`saldo`, `Nomes_Dividas`, `Valores_Dividas`, `Tempo_Dividas`, `Tempo_Divida_Fixo` , `Juros_Dividas`, `Id_User`, `nivel`) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        if ($stmt = mysqli_prepare($con, $query)) {
            mysqli_stmt_bind_param($stmt, "ssssssis", $saldo, $dividasStr, $valoresStr, $temposStr, $tempoStrFix,  $jurosStr, $user_id, $nivelDivida);

            if (mysqli_stmt_execute($stmt)) {
                $msg = "<p class=\"alerta green\">Informações salvas com sucesso</p>";
                $_SESSION['divida'] = 1;
            } else {
                $msg = "<p class=\"alerta red\">Erro ao salvar informações: " . mysqli_error($con) . "</p>";
                $destino = "location:../PAGES/adicaoDivida.php";
            }

            mysqli_stmt_close($stmt);
        } else {
            $msg = "<p class=\"alerta red\">Erro ao preparar a query: " . mysqli_error($con) . "</p>";
            $destino = "location:../PAGES/adicaoDivida.php";
        }

        $_SESSION['msg'] = $msg;
        header($destino);
        exit();
    } else {
        $msg = "<p class=\"alerta red\">Dados insuficientes para salvar </p>";
        $destino = "location:../PAGES/adicaoDivida.php";
        $_SESSION['msg'] = $msg;
        header($destino);
        exit();
    }
} else {
    $msg = "<p class=\"alerta red\">Dividas já cadastradas, altere ou delete!</p>";
    $destino = "location:../PAGES/adicaoDivida.php";
    $_SESSION['msg'] = $msg;
}
header($destino);
?>
