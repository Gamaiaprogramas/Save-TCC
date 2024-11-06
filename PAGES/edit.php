<?php 
@session_start();
include("../partials/header.php");

    include('../ACTS/connect.php');
    $codigo = $_SESSION['Id_user'];
    $usuarios = mysqli_query($con, "SELECT * FROM `registro` WHERE `Id_user` = '$codigo'");
    $usuario = mysqli_fetch_assoc($usuarios);
    
    
?>

<link rel="stylesheet" href="../STYLE/landing.css">
<link rel="stylesheet" href="../STYLE/edit.css">

<style>
  header {
    position: relative !important;
    background-color: #10002b !important;
    height: 7vw !important;
    margin: 0 !important;
    z-index: 1;
  }
  .show{
    display: block;
  }
  .hidden{
    display: none;
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<body>
    <div class="confirmar hidden" id="confirm">
        <div class="cima">
            <div class="textoCima">
                <p>Tem certeza que deseja deletar o seu <a>perfil</a>?</p>
                <p>Esta ação não poderá ser <b>revertida</b>!</p>
            </div>
        </div>
        <div class="baixo">
            <div class="botoesBaixo">
                <a href="../ACTS/deletar.php"><button class="btnSimBaixo" type="button">Sim</button></a>
                <button class="btnNaoBaixo" type="button" onclick="cancel()">Não</button> 
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
        console.log("oia");
        container = document.querySelector('#confirm');
        container.classList.add('show');
        container.classList.remove('hidden');
        document.body.classList.add('blurred'); // Adiciona o blur no body
        }

        function cancel() {
            console.log("oia");
            container = document.querySelector('#confirm');
            container.classList.add('hidden');
            container.classList.remove('show');
            document.body.classList.remove('blurred'); // Remove o blur do body
        }
    </script>
<form action="../ACTS/edit.act.php" enctype="multipart/form-data" method="post">
    <div class="conteudo">
        <div class="cimaConteudo">
            <h1>Edite Suas <a>informações</a>!</h1>
        </div>
        <div class="baixoConteudo">
            <div class="esquerda">
            <div class="foto">
                <img id="previewImg" src="<?php echo $_SESSION['foto']; ?>" class="miniaturaPerf">
                <label for="fileFoto" class="file-label">Escolher Foto</label>
                <input type="file" class="file-input" name="newFoto" id="fileFoto" id="inputGroupFile01" onchange="previewFile(this);">

            </div>
                <div class="plano">
                    <label>Plano 1</label>
                    <label class="textoPlano">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo repudiandae porro suscipit iure facilis. Quibusdam repudiandae delectus totam exercitationem, mollitia repellendus repellat eum a neque ratione atque quia perferendis vel?</label>
                </div>
            </div>
            <div class="direita">
                <div class="infos">
                    <div class="info">
                        <div class="conteudoInfo">
                            <label>Nome:</label>
                            <input type="text" name="nome" id="usuario" value="<?php echo $_SESSION['nome']; ?>">
                        </div>
                        <div class="conteudoInfo">
                            <label>Telefone:</label>
                            <input type="tel" name="telefone" id="telefone" value="<?php echo $_SESSION['telefone']; ?>">
                        </div>
                    </div>
                    <div class="info">
                        <div class="conteudoInfo">
                            <label>Email:</label>
                            <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>">
                        </div>
                        <div class="conteudoInfo">
                            <label>Nascimento:</label>
                            <input type="date" name="data" value="<?php echo $_SESSION['nascto']; ?>">
                        </div>
                    </div>
                    <div class="info">
                        <div class="conteudoInfo">
                            <label>CPF:</label>
                            <input type="text" name="cpf" value="<?php echo $_SESSION['cpf']; ?>">
                        </div>
                        <div class="conteudoInfo">
                            <label>Senha:</label>
                            <input type="password" name="senha" id="senha" value="<?php echo $_SESSION['senha']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <div class="conteudoInfo">
                            <label>Gênero:</label>
                            <select id="opcao" name="sexo">
                                    <option value="Masculino" <?php if ($_SESSION['genero'] == "Masculino") {
                                        echo "selected";
                                    } ?>>Masculino</option>
                                    <option value="Feminino" <?php if ($_SESSION['genero'] == "Feminino") {
                                        echo "selected";
                                    } ?>>Feminino</option>
                                    <option value="Não Binario" <?php if ($_SESSION['genero'] == "Não Binario") {
                                        echo "selected";
                                    } ?>>Não binario</option>
                                    <option value="Prefiro não Informar" <?php if ($_SESSION['genero'] == "Prefiro não Informar") {
                                        echo "selected";
                                    } ?>>Prefiro não informar</option>
                                </select>
                        </div>
                        <div class="conteudoInfoBtn">
                            <button type="button" class="btn" id="deleteButton" onclick="confirmDelete()">Deletar Perfil</button>
                            <button type="submit" class="btn">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <script>
       
            function previewFile(inputId, imgId) {
                const input = document.getElementById(inputId);
                const preview = document.getElementById(imgId);

                const file = input.files[0];
                const reader = new FileReader();

                reader.onloadend = function() {
                    preview.src = reader.result;
                }

                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "<?php echo $_SESSION['Foto']; ?>";
                }
            }
            function previewFile(input) {
                $("#previewImg").fadeOut(100);
                $("#imagemAtual").css("filter", "blur(5px)");
                $("#previewImg").css("filter", "blur(0px)");
                var file = $("input[type=file]").get(0).files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function () {
                        $("#previewImg").attr("src", reader.result);
                    };

                    reader.readAsDataURL(file);
                }
                $("#previewImg").fadeIn(800);
            }
        
    </script>
</body>
</html>
