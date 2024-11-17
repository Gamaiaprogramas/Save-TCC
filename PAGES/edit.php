<?php 
@session_start();
include("../partials/header.php");

include('../ACTS/connect.php');
$codigo = $_SESSION['Id_user'];
$usuarios = mysqli_query($con, "SELECT * FROM `registro` WHERE `Id_user` = '$codigo'");
$usuario = mysqli_fetch_assoc($usuarios);

$nivelBusca = mysqli_query($con, "SELECT nivel FROM `informacao` WHERE `Id_user` = '$codigo'");
$buscaResult = mysqli_fetch_assoc($nivelBusca);

$nivel = $buscaResult['nivel']; // Corrigir para acessar o valor da chave 'nivel'

switch ($nivel) {
    case 1:
        $textoPlano = "Plano 1: Aprender a lidar com dinheiro, pagar dívidas e sair do vermelho.";
        break;
    case 2:
        $textoPlano = "Plano 2: Começar pequenos investimentos, guardar dinheiro, aprender mais sobre finanças.";
        break;
    case 3:
        $textoPlano = "Plano 3: Investir meu dinheiro, ter uma reserva de emergência, corrigir meus gastos.";
        break;
    default:
        $textoPlano = "Plano não definido.";
        break;
}
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
                    <label>Plano <?php echo $nivel?></label>
                    <label class="textoPlano"><?php echo $textoPlano; ?></label>
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
                            <input type="text" id="telefone" name="telefone" value="<?php echo $_SESSION['telefone']; ?>">
                        </div>
                    </div>
                    <div class="info">
                        <div class="conteudoInfo">
                            <label>Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                        </div>
                        <div class="conteudoInfo">
                            <label>Nascimento:</label>
                            <input type="date" id="nasc" name="nascto"  value="<?php echo $_SESSION['nascto']; ?>">
                        </div>
                    </div>
                    <div class="info">
                        <div class="conteudoInfo">
                            <label>CPF:</label>
                            <input type="text" id="cpf" name="cpf"  value="<?php echo $_SESSION['cpf']; ?>">
                        </div>
                        <div class="conteudoInfo">
                            <label>Senha:</label>
                            <input type="password" name="senha" id="senha" value="<?php echo $_SESSION['senha']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="info" id="ultInfo">
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
                        <script>
    // Máscara para CPF
    document.getElementById('cpf').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
        if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos
        e.target.value = value.replace(/(\d{3})(\d)/, '$1.$2') // Adiciona o primeiro ponto
                                .replace(/(\d{3})(\d)/, '$1.$2') // Adiciona o segundo ponto
                                .replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona o hífen
    });

    // Máscara para telefone
    document.getElementById('telefone').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
        if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos
        e.target.value = value.replace(/(\d{2})(\d)/, '($1) $2') // Adiciona parênteses e espaço
                                .replace(/(\d{5})(\d)/, '$1-$2'); // Adiciona o hífen
    });

    // Validação de e-mail (não é uma máscara, mas é uma validação)
    document.getElementById('email').addEventListener('input', function (e) {
        const value = e.target.value;
        const validEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!validEmail.test(value)) {
            e.target.setCustomValidity("Endereço de e-mail inválido");
        } else {
            e.target.setCustomValidity("");
        }
    });

    // Função para formatar o nome (Primeira letra maiúscula)
    document.getElementById('nome').addEventListener('input', function() {
        let value = this.value.toLowerCase();
        this.value = value.split(' ')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ');
    });
</script>

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
    <script src="../JS/geral.js"></script>
</body>
</html>
