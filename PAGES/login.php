<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../STYLE/cadastro.css">
    <title>Cadastro</title>
</head>

<header>
    <img src="../PICS/imgs/logo_Alternativa-removebg.png" alt="">
</header>

<body>
<?php
    @session_start();
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <div class="main-login">
        <div class="left-login">
            <h1> <span>Faça login </span> <br>Para começar sua jornada</h1>
            <img src="../PICS/imgs/manage-money-animate.svg" class = "left-cadastro-image" alt="" srcset="">
        </div>
        <form action="../ACTS/login.act.php" method="post" enctype="multipart/form-data" id="formAddCliente" onsubmit="return verificaForm()" class="right-login">
            <div class="card-login">
                <h1>Entrar na <span>Save</span> </h1>
                <div class="textfield">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <br>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input  type="passworld" name="senha1" onkeyup="verificaSenha(senha1.value,senha2.value)" require placeholder="Senha  ">
                </div>
                <br>
                <input type="submit" class="btn-cadastrar-se" value="Entrar">
                <div class="forgot">
                    <p>Não tem cadastro? <a href="../PAGES/cadastro.php">Cadastre-se Já</a></p>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>