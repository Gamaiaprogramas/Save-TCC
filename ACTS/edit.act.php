<?php
session_start();
require('../ACTS/connect.php');
$id_usuario = $_SESSION['Id_user'];
// Captura os dados do formulário
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$genero = $_POST['sexo'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$data = $_POST['data'] ?? '';
$senha = md5($_POST['senha']) ?? '';
$nivel = $_POST['nivel']??'';


if ($senha != $_SESSION['senha']) {
    $senha =  $senha;
}

$_SESSION['senha'] = $_POST['senha'];
$_SESSION['data'] = $_POST['data'];
// Inicializa a variável $foto
$foto = $_SESSION['foto']; // Mantém a foto existente por padrão

// Verifica se um novo arquivo foi enviado
if (isset($_FILES['newFoto']) && $_FILES['newFoto']['error'] == 0) {
    $newFoto = $_FILES['newFoto'];
    
    // Gera um nome único para a foto e define o caminho
    $foto_nome = uniqid() . '-' . basename($newFoto['name']);
    $foto_caminho = "../clientes/fotosClientes/" . $_SESSION['nome'] . ".jpg";

    // Move o arquivo para o diretório de destino
    if (move_uploaded_file($newFoto['tmp_name'], $foto_caminho)) {
        $foto = $foto_caminho; // Atualiza a variável $foto com o caminho completo
    }
}

// Atualiza os dados no banco de dados
$update_query = "UPDATE `registro` SET
    `nome` = '$nome',
    `email` = '$email',
    `cpf` = '$cpf',
    `genero` = '$genero',
    `telefone` = '$telefone',
    `nascto` = '$data',
    `senha` = '$senha', 
    `foto` = '$foto'
    WHERE `Id_user` = '{$_SESSION['Id_user']}';";

$update_nivel ="UPDATE `informacao` SET `nivel` = '$nivel' WHERE `Id_user` = '$id_usuario'";
if (mysqli_query($con, $update_nivel)){
    $_SESSION['nivel2'] = $nivel;
}

if (mysqli_query($con, $update_query)) {
    // Atualiza a sessão com os novos valores
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['foto'] = $foto;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['genero'] = $genero;
    $_SESSION['telefone'] = $telefone;
    $_SESSION['data'] = $data;
    $_SESSION['nivel2'] = $nivel;
    // Redireciona para a página de perfil
    header("Location: ../PAGES/perfil.php");
    exit;
} else {
    echo "Erro ao atualizar os dados: " . mysqli_error($con);
}

?>
    