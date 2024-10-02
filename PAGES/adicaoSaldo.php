<?php
session_start();
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
    <title>Preencha as Dívidas</title>
    <link rel="stylesheet" href="../STYLE/acaoDivida.css">
</head>
<body>
<style>
  header {
    position: relative !important;
    background-color: #10002b !important;
    height: 7vw !important;
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

<h1>Informe seu saldo</h1>

<form method="POST">
    <div id="dividas-container">
        <div class="divida-item-2">
            <label for="saldo" id="lasaldo">Salário</label>
            <!-- Altere o tipo de 'number' para 'text' para aceitar formatação personalizada -->
            <input type="text" name="saldo" placeholder="R$999,99" id="saldo" require>
            <button class="learn-more" type="submit">
                <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
                </span>
                <span class="button-text">Próximo</span>
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
