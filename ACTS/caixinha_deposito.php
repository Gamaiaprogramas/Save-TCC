<?php
session_start();
include("../ACTS/connect.php");

$metaId = $_POST['meta_id'];
$valorDeposito =  str_replace(['R$', '.', ','], ['', '', '.'], $_POST['valor_deposito']);


$query = "UPDATE caixinha_sonhos 
          SET valor_atual = valor_atual + $valorDeposito 
          WHERE id = $metaId";
if (mysqli_query($con, $query)) {
    header('Location: ../PAGES/dashboard.php');
} else {
    echo "Erro: " . mysqli_error($con);
}
?>
