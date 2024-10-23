<?php
    @session_start();

    if($_SESSION['divida'] != 0){
        header("Location: ../pages/perfil.php");
        $_SESSION['divida'] = 1;
        $msg = "<p class=\"alerta red\">Dividas já cadastradas, altere ou delete!</p>" ;
        $_SESSION['msg'] = $msg;
    }