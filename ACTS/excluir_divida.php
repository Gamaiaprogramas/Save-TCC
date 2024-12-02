<?php
session_start();
require("../ACTS/connect.php");

$id_user = $_SESSION['Id_user']; // ID do usuário logado
$debtIndex = isset($_POST['debt_index']) ? intval($_POST['debt_index']) : -1; // Índice da dívida a ser excluída

// Verificar se o índice da dívida é válido
if ($debtIndex >= 0) {
    // Buscar as dívidas atuais do banco de dados
    $query = "SELECT Nomes_dividas, Valores_dividas, Juros_dividas, Tempo_Dividas FROM informacao WHERE Id_User = '$id_user'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Explodir os campos das dívidas em arrays
        $nomes_dividas = explode(',', $row['Nomes_dividas']);
        $valores_dividas = explode(',', $row['Valores_dividas']);
        $juros_dividas = explode(',', $row['Juros_dividas']);
        $tempo_dividas = explode(',', $row['Tempo_Dividas']);

        // Remover a dívida correspondente ao índice
        unset($nomes_dividas[$debtIndex]);
        unset($valores_dividas[$debtIndex]);
        unset($juros_dividas[$debtIndex]);
        unset($tempo_dividas[$debtIndex]);

        // Reindexar os arrays após exclusão
        $nomes_dividas = array_values($nomes_dividas);
        $valores_dividas = array_values($valores_dividas);
        $juros_dividas = array_values($juros_dividas);
        $tempo_dividas = array_values($tempo_dividas);

        // Converter os arrays de volta para strings
        $nomes_dividas_str = implode(',', $nomes_dividas);
        $valores_dividas_str = implode(',', $valores_dividas);
        $juros_dividas_str = implode(',', $juros_dividas);
        $tempo_dividas_str = implode(',', $tempo_dividas);

        // Atualizar os valores no banco de dados
        $update_query = "UPDATE informacao SET 
                         Nomes_dividas = '$nomes_dividas_str',
                         Valores_dividas = '$valores_dividas_str',
                         Juros_dividas = '$juros_dividas_str',
                         Tempo_Dividas = '$tempo_dividas_str'
                         WHERE Id_User = '$id_user'";

        if (mysqli_query($con, $update_query)) {
            $_SESSION['mensagem'] = "Dívida excluída com sucesso.";
        } else {
            $_SESSION['mensagem'] = "Erro ao excluir dívida: " . mysqli_error($con);
        }
    } else {
        $_SESSION['mensagem'] = "Erro ao buscar dívidas: " . mysqli_error($con);
    }
} else {
    $_SESSION['mensagem'] = "Índice de dívida inválido.";
}

// Redirecionar de volta para a página das dívidas
header('Location: ../PAGES/dashboard.php');
exit;
?>
