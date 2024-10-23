<?php
session_start();
require("../ACTS/sec.php");
require("../ACTS/connect.php");

if ($_SESSION['logado'] != true) {
    header("Location: ../PAGES/login.php");
    exit();
}

if (isset($_GET['codigo'])) {
    $Id_user = $_GET['codigo'];

    $stmt = $con->prepare("DELETE FROM registro WHERE Coduser = ?");
    $stmt->bind_param("i", $Id_user);

    if ($stmt->execute()) {
        session_destroy();
        header("Location: ../PAGES/login.php");
        exit();
    } else {
        echo "Erro ao deletar o perfil. Por favor, tente novamente.";
    }

    $stmt->close();
} else {
    echo "Código de usuário inválido.";
}

$con->close();
?>
