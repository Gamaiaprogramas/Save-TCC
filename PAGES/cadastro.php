<?php
    @session_start();
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <script src="../js/geral.js"></script>r
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Save</title>
    </head>
    <body>
        <div>
            <h1>Entre para SAVE!</h1>
            <fieldset>
                <form action="../ACTS/cadastro.act.php" method="post" enctype="multipart/form-data" id="formAddCliente" onsubmit="return verificaForm()">

            <label><p>Nome:</p><input type="text" name="nome"></label>
            <label><p>Emali:</p><input type="text" name="email"></label>
            <label><p>Cpf:</p><input type="text" name="cpf"></label>    
            <label><p>Informe seu gênero</p></label>
            <select id="opcao" name="sexo">
                <option value="opcao1">Masculino</option>
                <option value="opcao2">Feminino</option>
                <option value="opcao3">Não binario</option>
                <option value="opcao3">Prefiro não informar</option>
            </select>
            <label><p>telefone:</p><input type="text" name="telefone" id="txtTelefone"></label>
            <label><p>Nascimento:</p><input type="date" name="nascto"></label>
    
            
            <label><p>Senha:</p><input type="password" name="senha1" onkeyup="verificaSenha(senha1.value,senha2.value)" require></label>
            <label><p>Confirmar senha:</p><input type="password" name="senha2" onkeyup="verificaSenha(senha1.value,senha2.value)" require></label>
           
                    <input type="submit" class="buttCadastro" value="Enviar"> 
        </form>
            </fieldset>
        </div>

    </body>
        <script>
            window.onload = CadastroAct;
        </script>
    </html>