
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
        <div class="tudo">
            <div class="foto">
                <img src="https://molinatomaz.com.br/wp-content/uploads/2022/02/Dicas-essenciais-antes-de-assinar-um-contrato.jpg" alt="">
            </div>
            <div class="cadastro">
                <h1>Entre para SAVE!!</h1>
                <div class="separar">
                        <form action="../ACTS/cadastro.act.php" method="post" enctype="multipart/form-data" id="formAddCliente" onsubmit="return verificaForm()">
                            <div class="esquerda">
                                <label><p>Nome:</p><input type="text" name="nome"></label>
                                <label><p>CPF:</p><input type="text" name="cpf"></label>
                                <label><p>telefone:</p><input type="text" name="telefone" id="txtTelefone"></label>
                                <label><p>Senha:</p><input type="password" name="senha1" onkeyup="verificaSenha(senha1.value,senha2.value)" require></label>
                            </div>
                            <div class="direita">
                                <label><p>Emali:</p><input type="text" name="email"></label>
                                <label><p>Informe seu gênero</p>
                                    <select id="opcao" name="sexo">
                                        <option value="opcao1">Masculino</option>
                                        <option value="opcao2">Feminino</option>
                                        <option value="opcao3">Não binario</option>
                                        <option value="opcao3">Prefiro não informar</option>
                                    </select>
                                </label>
                                <label><p>Nascimento:</p><input type="date" name="nascto"></label>
                                <label><p>Confirmar senha:</p><input type="password" name="senha2" onkeyup="verificaSenha(senha1.value,senha2.value)" require></label>
                            </div>  
                        </form>
                        <?php
                            @session_start();
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                        ?>
                </div>
                <div class="final">
                    <div class="finalEsquerda">
                        <input type="submit" class="buttCadastro" value="Enviar">
                    </div>
                    <div class="finalDireita">
                        <p>Já possui cadastro?</p>
                        <a href="#">
                        <button>Entrar</button>
                    </div>
                </a>
                </div>
                

            </div>
        </div>
        <?php
        include("../partials/footer.php");
        ?>
    </body>
        <script>
            window.onload = CadastroAct;
        </script>
    </html>