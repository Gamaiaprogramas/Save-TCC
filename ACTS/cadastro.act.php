<?php
extract($_POST);
extract($_FILES);
require('../ACTS/connect.php');

@session_start();
$msg = "";
$destino = "location:login.php";
$busca = mysqli_query($con,"Select `email` from `registro` where `email` = '$email'");
if($busca->num_rows == 0){ 
    if ($senha1 == $senha2) {
        $senha = md5($senha1);
    } else {
        $msg = "<p class=\"alerta red\">Senhas divergentes!</p>";
        $destino = "location:../PAGES/cadastro.php";
    }
 
    if (isset($senha)) {

        if($nome == "" || $email=="" || $cpf =="" || $nascto=="" || $telefone=="") {
            $msg = "<p class=\"alerta red\">Preencha todos os campos</p>";
            $destino = "location:../PAGES/cadastro.php";
        }else {
            if (mysqli_query($con, "INSERT INTO `registro` (`Id_user`, `nome`, `email`,`cpf`,`genero`, `telefone`, `nascto`, `senha`,`foto`, `nivel`) VALUES 
            (NULL, '$nome', '$email','$cpf','$sexo','$telefone', '$nascto','$senha','https://api.dicebear.com/8.x/initials/svg?seed=$nome&backgroundColor=ff6d00
            ', '2');")) {
                $msg = "<div class=\"alerta green\"><p >Registro Criado com sucesso!</p></div>";
                $destino = "location:../PAGES/login.php";
            } else {
                $msg = "<p class=\"alerta red\">Erro ao gravar registro: " . $con->error . "</p>";
                $destino = "location:../PAGES/cadastro.php";
            }
        }
        }else{
            $msg = "<p class=\"alerta red\">Senhas divergentes ou vazia!</p>";
            $destino = "location:../PAGES/cadastro.php";
        }
    

}else{
    $msg = "<p class=\"alerta red\">Email já ultilizado!</p>";
    $destino = "location:../PAGES/cadastro.php";
}







$_SESSION['msg'] = $msg;
header($destino);
