<?php
// Supondo que você tenha incluído o arquivo `connect.php` corretamente
include("../ACTS/connect.php");
session_start();

// Verificar se a conexão foi estabelecida corretamente
if (!$con) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Obter os dados do formulário
$userId = $_SESSION['Id_user'];
$metaId = intval($_POST['index_meta']); // ID da meta selecionada
$novoNomeMeta = mysqli_real_escape_string($con, $_POST['novo_nome_meta']);
$novoValorMeta = floatval($_POST['novo_valor_meta']);

// Atualizar a meta no banco de dados
$query = "UPDATE caixinha_sonhos 
          SET nome_meta = '$novoNomeMeta', valor_meta = $novoValorMeta
          WHERE id = $metaId AND Id_User = '$userId'";

if (mysqli_query($con, $query)) {
    echo "Meta atualizada com sucesso!";
} else {
    echo "Erro ao atualizar meta: " . mysqli_error($con);
}

// Fechar conexão
mysqli_close($con);
?>
