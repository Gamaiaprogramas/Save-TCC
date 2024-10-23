<?php 
    @session_start();
    require('../ACTS/connect.php');
    extract($_POST);
    $destino = "";
    $msg = ""; // $nome é igual ao input de logar.php // trocar para email
    if ($senha1 == "" || $email == ""){
        $msg = "<div class=\"alerta red\"><p >Preencha todos os campos</p></div>";            
        $destino = "location:../PAGES/login.php";
        
    }else {
        $cliente = mysqli_query($con, "SELECT * FROM `registro` WHERE `email` = '$email'");
        if($cliente->num_rows == 1){
            $clientes = mysqli_fetch_assoc($cliente);
            $senha_login = md5($senha1);
            if($senha_login == $clientes['senha']){
                $_SESSION['logado'] = true;
                $_SESSION['divida'] = 0;
                $_SESSION['nome'] = $clientes['nome'];
                $_SESSION['email'] = $clientes['email'];
                $_SESSION['Id_user'] = $clientes['Id_user'];
                $_SESSION['foto'] = $clientes['foto'];
                $_SESSION['nivel'] = $clientes['nivel'];
                $_SESSION['cpf'] = $clientes['cpf'];
                $_SESSION['telefone'] = $clientes['telefone'];
                $_SESSION['nascto'] = $clientes['nascto'];
                $_SESSION['genero'] = $clientes['genero'];
                $msg = "<div class=\"alerta green\"><p >Login efetuado com sucesso</p></div>";            
                $destino = "location:../PAGES/landing.php";
                
            }else{
                $msg = "<div class=\"alerta red\"><p >Usuário ou senha incorreto</p></div>";            
                $destino = "location:../PAGES/login.php";
            }
        }else{
            $msg = "<div class=\"alerta red\"><p >Usuário não encontrado</p></div>";         
            $destino = "location:../PAGES/login.php";
        }
    }
    
    
var_dump($_POST);
$_SESSION['msg'] = $msg;
header($destino);
?>