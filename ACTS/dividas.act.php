<?php
session_start();
require('../ACTS/connect.php');

$msg = "";
$destino = "location:login.php";

// Verifica se as informações necessárias estão na sessão
if (isset($_SESSION['dividas'], $_SESSION['valores'], $_SESSION['tempo'], $_SESSION['juros'], $_SESSION['Id_user'], $_SESSION['nivelDivida'])) {
    
    // Cria a consulta SQL
    $query = "INSERT INTO `informacao` (`Nomes_Dividas`, `Valores_Dividas`, `Tempo_Dividas`, `Juros_Dividas`, `Id_User`, `nivel`) VALUES 
        ('" . implode(',', $_SESSION['dividas']) . "', '" . implode(',', $_SESSION['valores']) . "', '" . implode(',', $_SESSION['tempo']) . "', '" . implode(',', $_SESSION['juros']) . "', '" . $_SESSION['Id_user'] . "', '" . $_SESSION['nivelDivida'] . "')";

    // Executa a consulta
    if (mysqli_query($con, $query)) {
        $msg = "Informações salvas com sucesso.";
        // Aqui você pode redirecionar para outra página ou executar outras ações, se necessário
    } else {
        $msg = "Erro ao salvar informações: " . mysqli_error($con);
    }
} else {
    $msg = "Dados de sessão não encontrados.";
}

// Armazena a mensagem na sessão e redireciona
$_SESSION['msg'] = $msg;
header($destino);
exit();
?>
