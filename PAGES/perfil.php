<?php
    @session_start();
    include("../partials/headeralternative.php");
    
    if (!isset($_SESSION['Id_user'])) {
        header('Location: login.php');
        exit();
    }
    
    // Conectar ao banco de dados
    $conn = new mysqli('localhost', 'root', '', 'save'); // Ajuste conforme suas credenciais

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Buscar o nível do usuário na tabela 'informacao'
    $usuarioId = $_SESSION['Id_user']; // Supondo que o Id_user está na sessão
    $sql = "SELECT nivel FROM informacao WHERE Id_user = ?"; // Ajustar o nome da tabela conforme sua estrutura
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuarioId);
    $stmt->execute();
    $stmt->bind_result($nivel);
    $stmt->fetch();
    $stmt->close();
    
    // Depuração: Verificar o valor de $nivel
    $codigo = $_SESSION['Id_user'];
$nivelBusca = mysqli_query($conn, "SELECT nivel FROM `informacao` WHERE `Id_user` = '$codigo'");
$buscaResult = mysqli_fetch_assoc($nivelBusca);

@$nivel2 = $buscaResult['nivel']; // Corrigir para acessar o valor da chave 'nivel'

switch ($nivel2) {
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
  .btnEdit {
    margin-top: 10px;
  }
  .btnAnalise {
    margin-top: 20px;
    background-color: #ff6d00; /* cor de fundo do botão */
    padding: 10px 20px;
    border-radius: 5px;
    text-align: center;
    color: white;
    text-decoration: none;
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../STYLE/perfil.css">
    <title>Document</title>
</head>
<body>
    <div class="main-Perfil">
        <div class="titulo">
            <h1>Seu <a>perfil</a> na Save!</h1> 
        </div>
        <div class="conteudo">
            <div class="esquerda">
                <div class="fotoUsuario">
                    <?php echo "<img src='$_SESSION[foto]' class='miniaturaPerf'>"; ?>
                </div>
                <div class="plano">
                    <h1>Plano <?php  echo $nivel2 ?></h1>
                    <div class="texto">
                        <?php echo $textoPlano?>
                    </div>
                </div>
            </div>
            <div class="direita">
                <div class="nomes">Nome: 
                    <div class="phps">
                    <?php echo "$_SESSION[nome]"; ?>
                    </div>
                </div>
                    
                <div class="nomes">E-mail: 
                    <div class="phps">
                        <?php echo "$_SESSION[email]"; ?>
                    </div>
                </div>
                <div class="nomes">CPF: 
                    <div class="phps">
                        <?php echo "$_SESSION[cpf]"; ?>
                    </div>
                </div>
                <div class="nomes">Telefone: 
                    <div class="phps">
                        <?php echo "$_SESSION[telefone]"; ?>
                    </div>
                </div>
                <div class="nomes">Nascimento:
                    <div class="phps">
                        <?php
                        // $_SESSION['nascto'] contém a data no formato "YYYY-MM-DD"
                        $dataOriginal = $_SESSION['nascto'];
                        
                        // Dividir a data em partes
                        $partes = explode('-', $dataOriginal);
                        
                        // Verificar se a data está no formato correto
                        if (count($partes) == 3) {
                            // Rearranjar as partes para "DD-MM-YYYY"
                            $dataFormatada = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
                            echo $dataFormatada;
                        } else {
                            echo "Data inválida";
                        }
                        ?>
                    </div>
                </div>
                <div class="nomes">Gênero: 
                    <div class="phps">
                        <?php echo "$_SESSION[genero]"; ?>
                    </div>
                </div>

                <!-- Botão Editar -->
                <div class="editar">
                    <div class="btnEdit">
                        <a href="../PAGES/edit.php?codigo= echo $_SESSION['codigo']; ?>">Editar</a>
                    </div>
                </div>
                
                <!-- Botão Fazer Análise (fora da div do Editar) -->
                <!-- Verifica se o nível é nulo ou não -->
                <?php if ($nivel == null): ?>
                    <div class="btnAnalise">
                        <a href="../PAGES/adicaoSaldo.php">Fazer uma análise</a>
                    </div>
                <?php else: ?>
                    <div class="btnAnalise">
                        <a href="../PAGES/dashboard.php" >Ir para dashboard</a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>
</html>
