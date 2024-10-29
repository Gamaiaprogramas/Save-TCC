<?php
session_start();
require("../ACTS/sec.php");
require("../ACTS/connect.php");

if ($_SESSION['logado'] != true) {
    header("Location: ../PAGES/login.php");
    exit();
}

if (isset($_SESSION['logado']) && $_SESSION['logado'] == true ) {
    $cod = $_SESSION['Id_user'];
    mysqli_query($con, "DELETE FROM `registro` WHERE `registro`.`Id_user` = $cod");
    $msg = "<div class=\"alerta green\"><p >Conta deletada com sucesso</p></div>";
    $destino = "location:../PAGES/login.php";
} else {
    $msg = "<div class=\"alerta red\"><p >Erro ao deletar perfil</p></div>"; 
    $destino = "location:../PAGES/edit.php";
}

$_SESSION['msg'] = $msg;
header($destino);
?>
 