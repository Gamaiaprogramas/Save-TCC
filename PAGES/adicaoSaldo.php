<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Armazena o valor do nível na sessão
    $_SESSION['saldo'] = $_POST['saldo'];

    // Redireciona para a próxima página
    header("Location: ../PAGES/adicaoSaldo.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preencha as Dívidas</title>
    <link rel="stylesheet" href="../STYLE/acaoDivida.css">
        
</head>
<body>
<style>
  header{
    position: relative !important;
    background-color: #10002b !important;
    height: 7vw !important;
    margin: 0 !important;
    z-index: 1;
  }
</style>
<?php
    include("../partials/header.php");
  ?>

    <h1>Informe seu saldo</h1>

    <form method="POST">
        <div id="dividas-container">
            <div class="divida-item">
                <label for="saldo">Salário</label>
                <input type="number" name="saldo" placeholder="R$999,99">
                <button class="learn-more" onclick="removerDivida(this)" type="submit">
                    <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                    </span>
                    <span class="button-text">Póximo</span>
                    
                </button>            
            </div>

            
        </div>
    </form>
</body>
</html>