<?php
include("../ACTS/connect.php");
session_start();
$userId = $_SESSION['Id_user'];
$nomeMeta = $_POST['nome_meta'];
$valorMeta = $_POST['valor_meta'];

$query = "INSERT INTO caixinha_sonhos (user_id, nome_meta, valor_meta) VALUES ($userId, '$nomeMeta', $valorMeta)";
if (mysqli_query($con, $query)) {
    header('Location: ../PAGES/dashboard.php');
} else {
    echo "Erro: " . mysqli_error($con);
}
?>
