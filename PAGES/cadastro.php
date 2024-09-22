<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../STYLE/cadastro.css">
    <title>Cadastro</title>
</head>
<body>

    <div class="main-login">
        <div class="left-login">
            <h1> <span>Faça seu cadastro </span> <br>E entre para o nosso time</h1>
            <img src="../PICS/imgs/finance-app-animate.svg" class = "left-cadastro-image" alt="" srcset="">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Cadastra-se na <span>Save</span> </h1>
                <div class="textfield">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" placeholder="Nome">
                </div>
                <div class="textfield">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="textfield">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" placeholder="CPF">
                </div>
                <div class="textfield">
                <label for="escolha-genero">Escolha seu genero</label>
                <select id="opcao" name="sexo">
                    <option value="opcao1">Masculino</option>
                    <option value="opcao2">Feminino</option>
                    <option value="opcao3">Não binario</option>
                    <option value="opcao3">Prefiro não informar</option>
                </select>
                </div>
                <div class="textfield">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" placeholder="Telefone">
                </div>
                <div class="textfield">
                    <label for="nascimento">Nascimento</label>
                    <input type="date" name="nascimento" >
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="text" name="senha" placeholder="Senha  ">
                </div>
                <div class="textfield">
                    <label for="confirmar-senha">Confirmar senha</label>
                    <input type="text" name="confirmar-senha" placeholder="Confirmar senha">
                </div>
                <button class="btn-cadastrar-se">Cadastrar-se</button>
            </div>
        </div>
    </div>
    
</body>
</html>