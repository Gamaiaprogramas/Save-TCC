<?php
session_start();
require("../ACTS/sec.php");

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Armazena o valor do nível na sessão
    $_SESSION['nivelDivida'] = $_POST['nivels'];

    // Redireciona para a próxima página
    header("Location: ../PAGES/adicaoDivida.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecione o Nível</title>
</head>
<body>
    <h1>Escolha o Nível</h1>
    <form method="POST">
        <label>
            <input type="radio" name="nivels" value="1" required> Nível 1
        </label><br>
        <label>
            <input type="radio" name="nivels" value="2" required> Nível 2
        </label><br>
        <label>
            <input type="radio" name="nivels" value="3" required> Nível 3
        </label><br>
        <button type="submit">Próximo</button>
    </form>
</body>
</html>
