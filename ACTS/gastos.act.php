<?php
session_start();
require('../ACTS/connect.php');

// Depuração para ver se as sessões estão definidas
var_dump($_SESSION['Id_user']);
var_dump($_SESSION['Gastos']);
var_dump($_SESSION['valoresGasto']);

$msg = "";
$destino = "location:../PAGES/perfil.php";

// Verifica se as informações necessárias estão na sessão
if (isset($_SESSION['Id_user'])) {

    $user_id = $_SESSION['Id_user'];
    $Gastos2 = $_SESSION['Gastos'];
    $valoresGasto2 = $_SESSION['valoresGasto'];



    $GastosStr = implode(',', $Gastos2);
    $ValorGastotr = implode(',', $valoresGasto2);

    $query = "INSERT INTO `gastosfix` (`Nomes_gastos`, `Valores_gastos`, `Id_User`) VALUES (?, ?, ?)";
    
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "ssi", $GastosStr, $ValorGastotr, $user_id);

        if (mysqli_stmt_execute($stmt)) {
            $msg = "<p class=\"alerta green\">Informações salvas com sucesso</p>";
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
    // Caso as informações da sessão não estejam completas
    $msg = "<p class=\"alerta red\">Dados insuficientes para salvar12312313</p>";
    $_SESSION['msg'] = $msg;
    header("location:../PAGES/adicaoDivida.php");
    exit();
}
?>
