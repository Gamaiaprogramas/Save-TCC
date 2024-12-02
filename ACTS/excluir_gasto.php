<?php
session_start();
require("../ACTS/connect.php"); // Conexão com o banco de dados

// Verifica se a conexão foi estabelecida corretamente
if (!$con) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Obter o índice do gasto a ser excluído
$gastoIndex = isset($_POST['gasto_index']) ? intval($_POST['gasto_index']) : -1;

// Verificar se o índice é válido
if ($gastoIndex >= 0) {
    // Obter o ID do usuário
    $id_user = $_SESSION['Id_user'];

    // Buscar os dados de Nomes_Gastos e Valores_Gastos diretamente do banco de dados
    $query = "SELECT Nomes_Gastos, Valores_Gastos FROM gastosfix WHERE Id_User = '$id_user'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nomes_gastos = explode(',', $row['Nomes_Gastos']);
        $valores_gastos = explode(',', $row['Valores_Gastos']);

        // Verificar se o índice é válido nas listas
        if (isset($nomes_gastos[$gastoIndex]) && isset($valores_gastos[$gastoIndex])) {
            // Remover o gasto correspondente ao índice
            unset($nomes_gastos[$gastoIndex]);
            unset($valores_gastos[$gastoIndex]);

            // Reindexar os arrays para evitar índices quebrados
            $nomes_gastos = array_values($nomes_gastos);
            $valores_gastos = array_values($valores_gastos);

            // Atualizar as listas de gastos no banco de dados
            $nomes_gastos_str = implode(',', $nomes_gastos);
            $valores_gastos_str = implode(',', $valores_gastos);

            // Atualizar a tabela 'gastosfix'
            $update_query = "UPDATE gastosfix 
                             SET Nomes_Gastos = '$nomes_gastos_str', 
                                 Valores_Gastos = '$valores_gastos_str' 
                             WHERE Id_User = '$id_user'";

            // Executar a consulta de atualização
            if (mysqli_query($con, $update_query)) {
                echo "Gasto fixo excluído e dados atualizados com sucesso!";
            } else {
                echo "Erro ao atualizar dados: " . mysqli_error($mysql);
            }
        } else {
            echo "Índice de gasto inválido.";
        }
    } else {
        echo "Erro ao recuperar dados do banco.";
    }
} else {
    echo "Erro: índice de gasto inválido.";
}

// Redirecionar de volta para a página de gastos fixos
header('Location: ../PAGES/dashboard.php');
exit;
?>
