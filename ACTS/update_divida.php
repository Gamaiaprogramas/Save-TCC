<?php
session_start();
include("../ACTS/connect.php");

$id_user = $_SESSION['Id_user'];
$index_divida = intval($_POST['index_divida']);
$novo_nome = $_POST['novo_nome_divida'];
$novo_valor = floatval($_POST['novo_valor_divida']);
$novo_juros = floatval($_POST['novo_juros_divida']);
$novo_tempo = intval($_POST['novo_tempo_divida']);

// Buscar as dívidas existentes
$query = "SELECT Nomes_Dividas, Valores_Dividas, Juros_Dividas, Tempo_Dividas FROM informacao WHERE Id_User = '$id_user'";
$result = mysqli_query($con, $query);

if ($result) {
    $dividas = mysqli_fetch_assoc($result);
    $nomes_dividas = explode(",", $dividas['Nomes_Dividas']);
    $valores_dividas = explode(",", $dividas['Valores_Dividas']);
    $juros_dividas = explode(",", $dividas['Juros_Dividas']);
    $tempo_dividas = explode(",", $dividas['Tempo_Dividas']);

    // Atualizar os campos da dívida selecionada
    $nomes_dividas[$index_divida] = $novo_nome;
    $valores_dividas[$index_divida] = $novo_valor;
    $juros_dividas[$index_divida] = $novo_juros;
    $tempo_dividas[$index_divida] = $novo_tempo;

    // Concatenar os valores de volta
    $nomes_dividas = implode(",", $nomes_dividas);
    $valores_dividas = implode(",", $valores_dividas);
    $juros_dividas = implode(",", $juros_dividas);
    $tempo_dividas = implode(",", $tempo_dividas);

    // Atualizar o banco de dados
    $update_query = "UPDATE informacao SET 
        Nomes_Dividas = '$nomes_dividas',
        Valores_Dividas = '$valores_dividas',
        Juros_Dividas = '$juros_dividas',
        Tempo_Dividas = '$tempo_dividas'
        WHERE Id_User = '$id_user'";
    
    if (mysqli_query($con, $update_query)) {
        header("location: ../PAGES/dashboard.php");
    } else {
        echo "Erro ao atualizar dívida: " . mysqli_error($con);
    }
}
?>
