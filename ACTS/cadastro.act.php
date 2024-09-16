<?php
extract($_POST);
extract($_FILES);
require('../ACTS/connect.php');

@session_start();
$msg = "";
$destino = "location:login.php";
$busca = mysqli_query($con,"Select `email` from `registro` where `email` = '$email'");
if($busca->num_rows == 0){ 
    if ($txtSenha1 == $txtSenha2) {
        $senha = md5($senha1);
    } else {
        $senha = "";
    }
    if ($senha != "") {

        if (mysqli_query($con, "INSERT INTO `registro` (`Id_user`, `nome`, `email`,`cpf`,`genero`, `telefone`, `nascto`, `senha`) VALUES 
        (NULL, '$nome', '$email','$cpf','$sexo','$telefone', '$nascto','$senha');")) {
            $msg = "<p class=\"alerta green\">Registro Criado com sucesso!</p>";
            $destino = "location:logar.php";
        } else {
            $msg = "<p class=\"alerta red\">Erro ao gravar registro: " . $con->error . "</p>";
            $destino = "location:../PAGES/cadastro.php";
        }
    } else {
        $msg = "<p class=\"alerta red\">Campo senha vazio!</p>";
        $destino = "location:../PAGES/cadastro.php";
    }
}else{
    $msg = "<p class=\"alerta red\">Email já ultilizado!</p>";
    $destino = "location:../PAGES/cadastro.php";
}

$_SESSION['msg'] = $msg;
header($destino);
