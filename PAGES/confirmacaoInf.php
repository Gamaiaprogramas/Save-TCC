<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aqui você poderia armazenar mais informações, se necessário
    $_SESSION['confirmacao'] = $_POST['confirmacao'];

    // Redireciona para a página de finalização, onde os dados serão inseridos no banco
    header("Location:../ACTS/dividas.act.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação</title>
</head>
<body>
        <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
    <h1>Confirmação Final</h1>
    <p>Revise as informações antes de prosseguir.</p>

        <!-- Aqui você poderia exibir as informações já armazenadas na sessão para o usuário revisar -->
        <form method="POST" action="../ACTS/dividas.act.php">
        <label>Confirmar envio dos dados?</label><br>
        <input type="radio" name="confirmacao" value="sim" required> Sim<br>
        <input type="radio" name="confirmacao" value="nao" required> Não<br>
        
        <button type="submit">Finalizar</button>
    </form>
</body>
</html>
