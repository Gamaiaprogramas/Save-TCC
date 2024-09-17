
<link rel="stylesheet" href="../STYLE/cadastro.css">
<style>
  header{
    height: 7vw !important;
    background-color: #10002b !important;
    position: relative !important;
  }
</style>
<?php

    include("../partials/header.php");
  ?>
    .confirmar


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
            <?php
                @session_start();
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            </fieldset>
        </div>

    </body>
        <script>
            window.onload = CadastroAct;
        </script>
    </html>