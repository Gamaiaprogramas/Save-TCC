<?php 
@session_start();
include("../partials/header.php");
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
        <div class="cima"><p>Tem certeza?</p></div>
        <div class="baixo">
            <a href="../ACTS/deletar.php"><button type="button">Sim</button></a>
            <button type="button" onclick="cancel()">Não</button> 
        </div>
    </div>


    <div class="conteudo">
        <div class="cimaConteudo">
            <h1>Edite Suas <a>informações</a>!</h1>
        </div>
        <div class="baixoConteudo">
            <div class="esquerda">
            <div class="foto">
                <img id="previewImg" src="<?php echo $_SESSION['foto']; ?>" class="miniaturaPerf">
                <input type="file" class="custom-file-input" name="foto" id="fileFoto" onchange="previewFile('fileFoto', 'previewImg');">
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
                            <input type="">
                        </div>
                    </div>
                    <div class="info">
                        <div class="conteudoInfo">
                            <label>Gênero:</label>
                            <input type="text" name="genero" id="genero" value="<?php echo $_SESSION['genero']; ?>">
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

    <script>
        function confirmDelete() {
            console.log("oia")
            container = document.querySelector('#confirm')
            container.classList.add('show')
            container.classList.remove('hidden')
        }
        function cancel() {
            console.log("oia")
            container = document.querySelector('#confirm')
            container.classList.add('hidden')
            container.classList.remove('show')
        }
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
    </script>
</body>
</html>
