<?php 
include("../ACTS/connect.php");
@session_start();
$id_user = $_SESSION['Id_user'];

// Obtém o nível do usuário no banco de dados
$nivelBusca = mysqli_query($con, "SELECT nivel FROM `informacao` WHERE `Id_user` = '$id_user'");
$buscaResult = mysqli_fetch_assoc($nivelBusca);

$nivel2 = $buscaResult['nivel'] ?? null; // Obtém o nível, evitando erro de índice inexistente

// Obtém o nível atual da página onde o usuário está
$paginaAtual = basename($_SERVER['PHP_SELF']); 
$paginaEsperada = "educacaoN$nivel2.php";

// Verifica se o usuário já está na página correta
if ($paginaAtual !== $paginaEsperada) {
    header("Location: ../PAGES/educacaoN$nivel2.php");
    exit();
}