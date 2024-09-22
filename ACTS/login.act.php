<?php 
    @session_start();
    require('../ACTS/connect.php');
    extract($_POST);
    $destino = "";
    $msg = ""; // $nome é igual ao input de logar.php // trocar para email
    echo $email;
    
    $cliente = mysqli_query($con, "SELECT * FROM `registro` WHERE `email` = '$email'");
    if($cliente->num_rows == 1){
        $clientes = mysqli_fetch_assoc($cliente);
        $senha_login = md5($senha1);
        if($senha_login == $clientes['senha']){
            $_SESSION['logado'] = true;
            $_SESSION['nome'] = $clientes['nome'];
            $_SESSION['email'] = $clientes['email'];
            $_SESSION['Id_user'] = $clientes['Id_user'];
            $_SESSION['foto'] = $clientes['foto'];
            $_SESSION['nivel'] = $clientes['nivel'];
            $msg = "<p class=green>Sessão Iniciada</p>";
            $destino = "location:../PAGES/landing.php";
            header($destino);
            
        }else{
            echo "Senha Errada";
            $destino = "location:../PAGES/login.php";
            header($destino);
        }
    }else{
        echo "Usuario não encontrado";
    }
var_dump($_POST);
?>