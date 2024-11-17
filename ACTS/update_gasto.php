<?php
session_start();
require("../ACTS/connect.php");

$id_user = $_SESSION['Id_user'];
$gasto_index = intval($_POST['index_gasto']);
$new_value = floatval($_POST['novo_valor_gasto']);
$new_name = $_POST['novo_nome_gasto']; // Agora tratando como string

// Obter os gastos atuais
$query = "SELECT Nomes_gastos, Valores_gastos FROM gastosfix WHERE Id_User = '$id_user'";
$result = mysqli_query($con, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $valores_gastos = explode(",", $row['Valores_gastos']);
    $Nomes_gastos = explode(",", $row['Nomes_gastos']);
    
    // Atualiza o valor e nome do gasto no índice correto
    $valores_gastos[$gasto_index] = $new_value;
    $Nomes_gastos[$gasto_index] = $new_name;

    // Atualizar no banco de dados
    $valores_gastos = implode(",", $valores_gastos);
    $Nomes_gastos = implode(",", $Nomes_gastos);
    $update_query = "UPDATE gastosfix SET Nomes_Gastos = '$Nomes_gastos', Valores_gastos = '$valores_gastos' WHERE Id_User = '$id_user'";
    
    if (mysqli_query($con, $update_query)) {
        // Sucesso ao atualizar
    } else {
        // Erro ao atualizar
        echo "Erro: " . mysqli_error($con);
    }
}

header("Location: ../PAGES/dashboard.php");
exit();
?>
