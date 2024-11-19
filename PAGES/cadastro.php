<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../STYLE/cadastro.css">
        <title>Cadastro</title>
        <link rel="shortcut icon" href="../PICS/imgs/save_logo_site.png" type="image/x-icon">
    </head>
    <link rel="stylesheet" href="../STYLE/cadastro.css">
    <title>Cadastro</title>

    <?php
            @session_start();
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>

    <body>  


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
                                    <input type="text" id="nome" name="nome" placeholder="Nome" require>
                                </div>
                                <div class="textfield">
                                    <label >Email</label>
                                    <input type="email" id="email" name="email" placeholder="Email" require>
                                </div>
                                <div class="textfield">
                                    <label>CPF</label>
                                    <input type="text" id="cpf" name="cpf" placeholder="CPF" require>
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
                                    <input type="text" id="telefone" name="telefone" placeholder="Telefone" require>
                                </div>
                                <div class="textfield">
                                    <label >Nascimento</label>
                                    <input type="date" id="nasc" name="nascto" require>
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

                        <input type="submit" class="btn-cadastrar-se" value="Cadastrar-se" id="btn" onclick="verifique()">

                        <div class="forgot">
                            <p>Já tem cadastro? <a href="../PAGES/login.php">Faça seu login!</a></p>
                        </div>
                            
                    </form>
                    

                </div>
            
            </div>    
        </div>
    </div>

            


  

    <script>
            document.getElementById('cpf').addEventListener('input', function (e) {
              let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
              if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos
              e.target.value = value.replace(/(\d{3})(\d)/, '$1.$2') // Adiciona o primeiro ponto
                                    .replace(/(\d{3})(\d)/, '$1.$2') // Adiciona o segundo ponto
                                    .replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona o hífen
            });

            document.getElementById('telefone').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
            if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos
            e.target.value = value.replace(/(\d{2})(\d)/, '($1) $2') // Adiciona parênteses e espaço
                                  .replace(/(\d{5})(\d)/, '$1-$2'); // Adiciona o hífen
             });

            document.getElementById('email').addEventListener('input', function (e) {
            const value = e.target.value;
            const validEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!validEmail.test(value)) {
              e.target.setCustomValidity("Endereço de e-mail inválido");
            } else {
              e.target.setCustomValidity("");
            }
            });

            document.getElementById('nome').addEventListener('input', function() {
            let value = this.value.toLowerCase();
            this.value = value.split(' ')
                .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                .join(' ');
            });

            window.onload = CadastroAct;



    </script>
    <script src="../JS/geral.js"></script>
</body>
</html>