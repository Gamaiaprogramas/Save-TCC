<?php
// Inicia a sessão
session_start();

// Conexão com o banco de dados
include("../ACTS/connect.php");

// Obter dados do usuário
$id_user = $_SESSION['Id_user'];

// Obter os dados do formulário
$debt_index = intval($_POST['debt_index']);
$tempo_divida = intval($_POST['tempo_dividas']);

// Consulta para obter os dados atuais
$query = "SELECT Tempo_Dividas FROM informacao WHERE Id_User = '$id_user'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$tempo_dividas = explode(",", $row['Tempo_Dividas']);

// Verificar se a dívida é de pagamento único
if ($tempo_divida == 9999) {
    $tempo_dividas[$debt_index] = 0; // Definir como 0 (pago)
} else {
    // Diminuir o tempo da dívida
    $tempo_dividas[$debt_index] = max(0, intval($tempo_dividas[$debt_index]) - 1);
}

// Atualizar no banco de dados
$tempo_dividas_str = implode(",", $tempo_dividas);
$update_query = "UPDATE informacao SET Tempo_Dividas = '$tempo_dividas_str' WHERE Id_User = '$id_user'";
mysqli_query($con, $update_query);

// Redirecionar de volta para a dashboard
header("Location: ../PAGES/dashboard.php");
exit;
?>
