<?php
session_start();
require("../ACTS/connect.php");

$id_user = $_SESSION['Id_user'];
$new_balance = floatval($_POST['novo_saldo']);

// Atualizar o saldo no banco de dados
$update_query = "UPDATE informacao SET saldo = '$new_balance' WHERE Id_User = '$id_user'";
mysqli_query($con, $update_query);

header("Location: ../PAGES/dashboard.php");
exit();
?>
