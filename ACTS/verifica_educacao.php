<?php 
include("../ACTS/connect.php");
@session_start();
$id_user = $_SESSION['Id_user'];

$nivelBusca = mysqli_query($con, "SELECT nivel FROM `informacao` WHERE `Id_user` = '$id_user'");
$buscaResult = mysqli_fetch_assoc($nivelBusca);


$nivel2 = $buscaResult['nivel']; // Corrigir para acessar o valor da chave 'nivel'

if($nivel2 != null){
    header("Location: ../PAGES/educacaoN$nivel2");
    exit();
}else{
    header("Location: ../PAGES/perfil.php");
    exit();
}

?>