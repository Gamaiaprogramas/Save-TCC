<?php 
    @session_start();
   
    session_destroy();
    $_SESSION['msg'] = "<div class=\"alerta green\"><p >Login efetuado com sucesso</p></div>";
    $destino = "location:../PAGES/landing.php";
    header($destino);
?>