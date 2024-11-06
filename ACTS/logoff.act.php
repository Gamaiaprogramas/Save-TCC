<?php 
    @session_start();
    session_unset(
        $_SESSION['logado'],
        $_SESSION['nome'] ,
        $_SESSION['email'] ,
        $_SESSION['Id_user'] ,
        $_SESSION['foto'] ,
        $_SESSION['nivel'] ,
        $_SESSION['cpf'] ,
        $_SESSION['telefone'] ,
        $_SESSION['nascto'],
        $_SESSION['genero'] ,
        $_SESSION['divida'] 
    );
    session_destroy();
    $_SESSION['msg'] = "<div class=\"alerta green\"><p >Login efetuado com sucesso</p></div>";
    $destino = "location:../PAGES/landing.php";
    header($destino);
?>