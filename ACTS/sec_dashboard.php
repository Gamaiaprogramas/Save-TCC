<?php

require('../ACTS/connect.php');
@session_start();

$cod = $_SESSION['Id_user'];

$busca = mysqli_query($con, "SELECT `Nomes_Dividas` FROM `informacao` WHERE `Id_User` = '$cod'");

if (mysqli_num_rows($busca) == 0) {
    header("Location: ../PAGES/adicaoSaldo.php");
    exit();
}
