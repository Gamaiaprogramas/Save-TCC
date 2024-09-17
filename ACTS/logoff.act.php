<?php 
    @session_start();
    session_unset();
    session_destroy();
    $destino = "location:../PAGES/landing.php";
    header($destino);
?>