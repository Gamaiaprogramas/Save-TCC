<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../STYLE/cadastro.css">
    <link rel="shortcut icon" href="../PICS/imgs/save_logo_site.png" type="image/x-icon">
    <title>Cadastro</title>
</head>
<?php
    // Criando um intervalo de 1 a 10
    $intervalo = range(1, 5);

    // Exibindo o intervalo
    foreach ($intervalo as $numero) {
        @session_start();
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    }


    ?>
<!-- <header>
    <a href="../PAGES/landing.php">
        <img src="../PICS/imgs/logo_Alternativa-removebg.png" alt="">
    </a>
</header> -->


<header id="header">

        <div class="interface">
            <a href="../PAGES/landing.php">
                <section class="logo">
                    <img src="../PICS/imgs/logo.svg" alt="logo tipo do site">
            </section>
            </a>
            

            <section class="menu-desktop">
                <nav>
                    <ul> 
                    </ul>
                </nav> 
            </section>  
             
            <section class="btn-contato">

</section>

            
                
            </section>

            <div class="btn-menu-mob" id="btn-menu-mob">
                <div class="line-menu-mob-1"></div>
                <div class="line-menu-mob-2"></div>
            </div>
            
            <section class="menu-mobile" id="menu-mobile">
                <nav>
                    <ul>
                        
                    </ul>
                </nav> 
            </section>

        </div>

    </header>

<body>

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
                    <input  type="password" name="senha1" onkeyup="verificaSenha(senha1.value,senha2.value)" require placeholder="Senha  ">
                </div>
                <br>
                <input type="submit" class="btn-cadastrar-se" value="Entrar">
                <div class="forgot">
                    <p>Não tem cadastro? <a href="../PAGES/cadastro.php">Cadastre-se Já</a></p>
                </div>
            </div>
        </form>
    </div>
    <script src="../JS/geral.js"></script>
</body>
</html>