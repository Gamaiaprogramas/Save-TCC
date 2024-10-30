<?php 
    @session_start();
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
        <div class="titulo">
            <h1>Seu <a>perfil</a> na Save!</h1> 
        </div>
        <div class="conteudo">
            <div class="esquerda">
                <div class="fotoUsuario">
                    <?php echo "<img src='$_SESSION[foto]' class='miniaturaPerf'>"; ?>
                </div>
                <div class="plano">
                    <h1>Plano 1</h1>
                    <div class="texto">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti esse illum itaque animi labore, ea iusto vero est voluptatibus, non sint, qui iste quos id ipsam? Perferendis voluptatem ab quos.
                    </div>
                </div>
            </div>
            <div class="direita">
                <div class="nomes">Nome: 
                    <div class="phps">
                    <?php echo "$_SESSION[nome]"; ?>
                    </div>
                </div>
                    
                <div class="nomes">E-mail: 
                    <div class="phps">
                        <?php echo "$_SESSION[email]"; ?>
                    </div>
                </div>
                <div class="nomes">CPF: 
                    <div class="phps">
                        <?php echo "$_SESSION[cpf]"; ?>
                    </div>
                </div>
                <div class="nomes">Telefone: 
                    <div class="phps">
                        <?php echo "$_SESSION[telefone]"; ?>
                    </div>
                </div>
                <div class="nomes">Nascimento:
                    <div class="phps">
                    <?php echo "$_SESSION[nascto]"; ?>
                    </div>

                </div>
                <div class="nomes">Gênero: 
                    <div class="phps">
                        <?php echo "$_SESSION[genero]"; ?>
                    </div>
                </div>
                <div class="editar">
                    <div class="btnEdit">
                        <a href="../PAGES/edit.php?codigo= echo $_SESSION['codigo']; ?>">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>