<?php
session_start();
require("../ACTS/connect.php");

$id_user = $_SESSION['Id_user']; // ID do usuário logado
$id_meta = $_SESSION['id_da_meta'];
$_SESSION['result_novo'] = null;
// Verificar se o índice da dívida é válido

$query = "DELETE FROM caixinha_sonhos WHERE `caixinha_sonhos`.`id` = $id_meta";

$result = mysqli_query($con, $query);

// Redirecionar de volta para a página das dívidas
header('Location: ../PAGES/dashboard.php');
exit;
?>
