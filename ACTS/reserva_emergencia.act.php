<?php 
session_start();
require("../ACTS/connect.php");
extract($_POST);

$valorNovo = $_POST['reserva_input'];

$query_reserva = "SELECT valor_reserva FROM informacao WHERE Id_User = '$id_user'";
$ValorResultado = mysqli_fetch_assoc($result_reserva);
$ValorRultadoReal = $ValorResultado['valor_reserva'];
$NovoResultado = ($ValorRultadoReal + $valorNovo);

$novaQuery = "UPDATE `informacao` SET `valor_reserva` = '$NovoResultado' WHERE Id_User = '$id_user' "

    mysqli_query($con, $novaQuery);



    header("location: ../PAGES/dashboard.php");
    exit();
?>