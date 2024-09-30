<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../STYLE/cadastro.css">
        <title>Cadastro</title>
    </head>
    <link rel="stylesheet" href="../STYLE/cadastro.css">
    <title>Cadastro</title>

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
        
        <?php
            @session_start();
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>

        <div class="main-login">
        
            <div class="left-login">
                    
                    <h1> <span>Faça seu cadastro </span> <br>E entre para o nosso time</h1>
                    <img src="../PICS/imgs/finance-app-animate.svg" class = "left-cadastro-image" alt="" srcset="">
                </div>

                <div class="right-login">
                    <form action="../ACTS/cadastro.act.php" method="post" enctype="multipart/form-data" id="formAddCliente" onsubmit="return verificaForm()" class="card-login">
                        <h1>Cadastre-se <span>na Save</span> </h1>
                            
                        <div class="center">
                            <div class="primeiro">
                                <div class="textfield">
                                    <label >Nome</label>
                                    <input type="text" name="nome" placeholder="Nome">
                                </div>
                                <div class="textfield">
                                    <label >Email</label>
                                    <input type="text" name="email" placeholder="Email">
                                </div>
                                <div class="textfield">
                                    <label>CPF</label>
                                    <input type="text" name="cpf" placeholder="CPF">
                                </div>
                                <div class="textfield">
                                <label>Escolha seu genero</label>
                                <select id="opcao" name="sexo">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Não Binario">Não binario</option>
                                    <option value="Prefiro não Informar">Prefiro não informar</option>
                                </select>
                                </div>
                            </div>
                            <div class="segundo">
                                <div class="textfield">
                                    <label>Telefone</label>
                                    <input type="text" name="telefone" placeholder="Telefone">
                                </div>
                                <div class="textfield">
                                    <label >Nascimento</label>
                                    <input type="date" name="nascto" >
                                </div>
                                <div class="textfield">
                                    <label >Senha</label>
                                    <input type="password" name="senha1" onkeyup="verificaSenha(senha1.value,senha2.value)" require>
                                </div>
                                <div class="textfield">
                                    <label >Confirmar senha</label>
                                    <input type="password" name="senha2" onkeyup="verificaSenha(senha1.value,senha2.value)" require>
                                </div>
                                
                            </div>
                        </div>

                        <input type="submit" class="btn-cadastrar-se" value="Cadastrar-se">

                        <div class="forgot">
                            <p>Já tem cadastro? <a href="../PAGES/login.php">Faça seu login!</a></p>
                        </div>
                            
                    </form>
                    

                </div>
    
            </div>    
        </div>
    </div>

  

    <script>
            window.onload = CadastroAct;
        </script>
    <script src="../JS/geral.js"></script>
</body>
</html>