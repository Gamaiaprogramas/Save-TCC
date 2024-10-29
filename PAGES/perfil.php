<?php 

    include("../partials/header.php");

?>

<link rel="stylesheet" href="../STYLE/landing.css">

<style>
  header {
    position: relative !important;
    background-color: #10002b !important;
    height: 7vw !important;
    margin: 0 !important;
    z-index: 1;
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../STYLE/perfil.css">
    <title>Document</title>
</head>
<body>
    <div class ="main-Perfil">
  
            <?php
                @session_start();
                if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
                    echo "<div class = 'divImg'>";
                    echo "<img src='$_SESSION[foto]' class='miniaturaPerf'>";
                    echo "</div>";
                    echo "<div class = 'divInfo'>";
                    echo "<li >Olá $_SESSION[nome]</li>";
                    echo "<li>Email $_SESSION[email]</li>";
                    echo "<li >Cpf: $_SESSION[cpf]</li>";
                    echo "<li >Telefone: $_SESSION[telefone]</li>";
                    echo "<li >Nascimento: $_SESSION[nascto]</li>";
                    echo "<li >Gênero: $_SESSION[genero]</li>";       
                }
            ?>
        
            <div class="editar">
                <div class="btnedit">
                    <a href="../PAGES/edit.php?codigo= echo $_SESSION['codigo']; ?>">Editar</a>
                </div>
            </div>
    </div>
    
</body>
</html>