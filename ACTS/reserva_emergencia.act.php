<?php 
session_start();
require("../ACTS/connect.php");
extract($_POST);

$id_user = $_SESSION['Id_user'];
$valorNovo = $_POST['reserva_input'];

// Executar a query para obter o valor atual da reserva
$query_reserva = "SELECT valor_reserva FROM informacao WHERE Id_User = '$id_user'";
$resultado_reserva = mysqli_query($con, $query_reserva);

// Verificar se a query foi bem-sucedida
if ($resultado_reserva && mysqli_num_rows($resultado_reserva) > 0) {
    $ValorResultado = mysqli_fetch_assoc($resultado_reserva);
    $ValorRultadoReal = floatval($ValorResultado['valor_reserva']); // Garantir que é float
    $NovoResultado = $ValorRultadoReal + floatval($valorNovo);

    // Atualizar o valor da reserva no banco de dados
    $novaQuery = "UPDATE `informacao` SET `valor_reserva` = '$NovoResultado' WHERE Id_User = '$id_user'";
    mysqli_query($con, $novaQuery);
} else {
    // Lidar com erros caso o usuário não seja encontrado
    echo "Erro ao buscar valor da reserva ou usuário não encontrado.";
    exit();
}

header("location: ../PAGES/dashboard.php");
exit();
?>
