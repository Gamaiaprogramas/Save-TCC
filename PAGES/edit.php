<?php 
@session_start();
include("../partials/headeralternative.php");

include('../ACTS/connect.php');
$codigo = $_SESSION['Id_user'];
$usuarios = mysqli_query($con, "SELECT * FROM `registro` WHERE `Id_user` = '$codigo'");
$usuario = mysqli_fetch_assoc($usuarios);

$nivelBusca = mysqli_query($con, "SELECT nivel FROM `informacao` WHERE `Id_user` = '$codigo'");
$buscaResult = mysqli_fetch_assoc($nivelBusca);

@$nivel = $buscaResult['nivel']; // Corrigir para acessar o valor da chave 'nivel'

switch ($nivel) {
    case 1:
        $textoPlano = "Aprender a lidar com dinheiro, pagar dívidas e sair do vermelho.";
        break;
    case 2:
        $textoPlano = "Começar pequenos investimentos, guardar dinheiro, aprender mais sobre finanças.";
        break;
    case 3:
        $textoPlano = "Investir meu dinheiro, ter uma reserva de emergência, corrigir meus gastos.";
        break;
    default:
        $textoPlano = "Plano não definido, faça a sua análise para obter um.";
        break;
}
?>

<link rel="stylesheet" href="../STYLE/landing.css">
<link rel="stylesheet" href="../STYLE/edit.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<title>Save - Editar Perfil</title>
<style>
    header{
        background-color: #f8f9fa !important;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    }
    .green{
        background-color: green;
        width: 100%;
        height: 2vw;
        color: #fff;
        display: flex;
        justify-content: center;
        position: absolute;
        top: 0;
        align-items: center;
        margin-top: -.2vw !important;
    }

    .red{
        background-color: #c50000;
        width: 100%;
        height: 2vw;
        color: #fff;
        display: flex;
        justify-content: center;
        position: absolute;
        top: 0;
        align-items: center;
        margin-top: -.2vw !important;
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
    
    <script>
        function confirmDelete() {
        container = document.querySelector('#confirm');
        container.classList.add('show');
        container.classList.remove('hidden');
        
        const dashboardContainer = document.querySelector('.conteudo');
        const header = document.querySelector('header');
        if (dashboardContainer) {
            header.style.filter = 'blur(8px)';
            dashboardContainer.style.filter = 'blur(8px)';

            header.style.pointerEvents = 'none';
            dashboardContainer.style.pointerEvents = 'none';
        }
        }

        function cancel() {
            container = document.querySelector('#confirm');
            container.classList.add('hidden');
            container.classList.remove('show');

            const dashboardContainer = document.querySelector('.conteudo');
            const header = document.querySelector('header');
            if (dashboardContainer) {
            header.style.filter = 'blur(0px)';
            dashboardContainer.style.filter = 'blur(0px)';

            header.style.pointerEvents = 'auto';
            dashboardContainer.style.pointerEvents = 'auto';
        }
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
                    <input type="file" class="file-input" name="newFoto" id="fileFoto" onchange="previewFile();">
                </div>

                


                <?php 
                if (isset($nivel) && $nivel != '') {
                    echo "
                    <div class='plano'>
                    <label>
                      
                        <select id='nivel' name='nivel' onchange='trocarPalavra()'>
                        <option value='1' <?php echo ($nivel == 1) ? 'selected' : ''; ?>Plano 1</option>
                        <option value='2' <?php echo ($nivel == 2) ? 'selected' : ''; ?>Plano 2</option>
                        <option value='3' <?php echo ($nivel == 3) ? 'selected' : ''; ?>Plano 3</option>
           
                        </select>
                    </label>
                    <label class='textoPlano' id='top'></label>
                </div>
                    
                    ";
                }else{
                    echo"
                    <div class='plano'>
                    <label class='nenhum'>Nenhum plano cadastrado, faça uma análise!</label>
                    </div>
                    
                    
                    ";
                }
                
                ?>
                <script>
                                function trocarPalavra() {
                    // Obtém o select e o valor selecionado
                    const select = document.querySelector('#nivel');
                    const selectedValue = select.value;

                    // Obtém o elemento de exibição
                    const topLabel = document.querySelector('#top');

                    // Define os textos para cada plano
                    const planos = {
                        1: "Aprender a lidar com dinheiro, pagar dívidas e sair do vermelho.",
                        2: " Começar pequenos investimentos, guardar dinheiro, aprender mais sobre finanças.",
                        3: " Plano não definido, faça a sua análise para obter um."
                    };

                    // Atualiza o texto com base no valor selecionado
                    topLabel.textContent = planos[selectedValue];
                }

                // Executa a função ao carregar para exibir o valor inicial
                trocarPalavra();
                </script>
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
                            <button type="submit" class="btn" id="salvarButton">Salvar</button>
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
            function previewFile() {
    const input = document.getElementById('fileFoto');  // Pega o input pelo ID
    const preview = document.getElementById('previewImg');  // Pega a imagem de pré-visualização

    const file = input.files[0];  // Pega o primeiro arquivo selecionado

    // Exibe o efeito de fade e desfoque
    $("#previewImg").fadeOut(100);
    $("#imagemAtual").css("filter", "blur(5px)");
    $("#previewImg").css("filter", "blur(0px)");

    if (file) {
        const reader = new FileReader();

        reader.onload = function () {
            preview.src = reader.result;  // Atualiza o 'src' da imagem com o resultado da leitura do arquivo
        };

        reader.readAsDataURL(file);  // Lê o arquivo como URL de dados
    } else {
        preview.src = "<?php echo $_SESSION['foto']; ?>";  // Retorna a foto original caso não haja arquivo
    }

    // Faz a imagem de pré-visualização aparecer suavemente
    $("#previewImg").fadeIn(800);
}

    </script>
    <script src="../JS/geral.js"></script>
</body>
    <div  class="confirmar hidden" id="confirm">
        <div class="cima">
            <div class="textoCima">
                <p>Tem certeza que deseja <a>deletar</a> o seu perfil <a>SAVE</a>?</p>
                <b><p>Esta ação não poderá ser revertida!</p></b>
            </div>
        </div>
        <div class="baixo">
            <div class="botoesBaixo">
                <a href="../ACTS/deletar.php"><button class="btnSimBaixo" type="button"><span>SIM</span></button></a>
                <button class="btnNaoBaixo" type="button" onclick="cancel()">NÃO</button> 
            </div>
        </div>
    </div>
</html>
