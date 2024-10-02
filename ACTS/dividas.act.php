<?php
session_start();
require('../ACTS/connect.php'); // Certifique-se de que esta linha conecta corretamente ao banco

$msg = "";
$destino = "location:../PAGES/confirmacaoInf.php";

// Verifica se as informações necessárias estão na sessão
if (isset($_SESSION['dividas'], $_SESSION['valores'], $_SESSION['juros'], $_SESSION['tempo'], $_SESSION['saldo'], $_SESSION['Id_user'], $_SESSION['nivelDivida'])) {

    // Extrai os dados das sessões
    $dividas = $_SESSION['dividas'];
    $valores = $_SESSION['valores'];
    $juros = $_SESSION['juros'];
    $tempos = $_SESSION['tempo'];
    $saldo = floatval($_SESSION['saldo']);
    $user_id = $_SESSION['Id_user'];  // ID do usuário logado
    $nivelDivida = $_SESSION['nivelDivida'];

    // Validação simples para evitar inserção de valores vazios
    if (empty($dividas) || empty($valores) || empty($juros) || empty($tempos) || empty($saldo) || empty($user_id)) {
        $msg = "<div class=\"alerta red\"><p >Preencha todos os campos!</p></div>";
        $_SESSION['msg'] = $msg;
        header($destino);
        exit();
    }

    // Concatena os dados das dívidas, valores, juros e tempos em strings separadas por vírgulas
    $dividasStr = implode(',', $dividas);
    $valoresStr = implode(',', $valores);
    $jurosStr = implode(',', $juros);
    $temposStr = implode(',', $tempos);

    // Preparação da query para prevenir SQL Injection
    $query = "INSERT INTO `informacao` (`saldo`, `Nomes_Dividas`, `Valores_Dividas`, `Tempo_Dividas`, `Juros_Dividas`, `Id_User`, `nivel`) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Prepara a query
    if ($stmt = mysqli_prepare($con, $query)) {
        // Bind de parâmetros
        mysqli_stmt_bind_param($stmt, "sssssis", $saldo, $dividasStr, $valoresStr, $temposStr, $jurosStr, $user_id, $nivelDivida);

        // Executa a query
        if (mysqli_stmt_execute($stmt)) {

            $msg = "<div class=\"alerta green\"><p >Informações salvas com sucesso</p></div>";

        } else {
            $msg = "<div class=\"alerta red\"><p >Erro ao salvar informações:"+  mysqli_error($con) + "</p></div>";
        }

        // Fecha a statement
        mysqli_stmt_close($stmt);
    } else {

        $msg = "<div class=\"alerta red\"><p >Erro ao preparar a query: "+  mysqli_error($con) + "</p></div>";

    }

    // Redireciona para a próxima página com a mensagem
    header($destino);
    $_SESSION['msg'] = $msg;

    exit();
} else {
    // Caso as informações da sessão não estejam completas
    $msg = "<div class=\"alerta red\"><p >Dados insuficientes para salvar</p></div>";
    $_SESSION['msg'] = $msg;

    header($destino);
    exit();
}
header($destino);
?>
