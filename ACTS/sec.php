<?php
    @session_start();

    if(!isset($_SESSION['logado']) || $_SESSION['logado'] != true){
        header("Location: ../pages/login.php");
        $_SESSION['logado'] = false;
    }