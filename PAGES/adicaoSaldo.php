<?php

require("../ACTS/sec.php");

@session_start();
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Remove o "R$" e formatação ao salvar o saldo na sessão
        $_SESSION['saldo'] = str_replace(['R$', '.', ','], ['', '', '.'], $_POST['saldo']);

        // Redireciona para a próxima página
        header("Location: ../PAGES/selecao.php");
        exit();
    }



// Verifica se o formulário foi enviado

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save - Adicionar Ganho Mensal</title>
    <link rel="stylesheet" href="../STYLE/acaoDivida.css">
</head>
<body>
<style>
  header {
    position: relative !important;
    background-color: #10002b !important;
    height: 140px !important;
    margin: 0 !important;
    z-index: 1;
  }
</style>

<?php
    @session_start();
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    include("../partials/header.php");
?>

<h1 class="ganho">Informe seu ganho mensal!</h1>

<form method="POST">
    <div id="dividas-container">
        <div class="divida-item-2">
            <label for="saldo" id="lasaldo">Ganho Mensal</label>
            <!-- Altere o tipo de 'number' para 'text' para aceitar formatação personalizada -->
            <input type="text" name="saldo" placeholder="R$999,99" id="saldo" required>
            <button class="btnProx" type="submit" >
                <span>Próximo</span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 74 74"
                    height="34"
                    width="34"
                    class="svg-icon"
                    fill="white"
                    >
                <circle class="circle" stroke-width="3" stroke="white" r="35.5" cy="37" cx="37" fill="none"></circle>
                    <path
                        d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z"
                    ></path>
                </svg>
            </button>         
        </div>
    </div>
</form>

<script>
    document.getElementById('saldo').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito

        // Limita a um máximo de 15 dígitos (sem contar vírgulas e pontos)
        if (value.length > 15) value = value.slice(0, 15);

        // Formata o número com R$: insere a vírgula e depois os pontos para separar os milhares
        e.target.value = 'R$ ' + new Intl.NumberFormat('pt-BR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(value / 100);
    });
</script>

</body>
</html>
