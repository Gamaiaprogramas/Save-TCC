<?php
session_start();
require('../ACTS/connect.php');

// Mensagem
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Gastos']) && isset($_POST['valoresGasto'])) {
        $_SESSION['Gastos'] = $_POST['Gastos'];
        $_SESSION['valoresGasto'] = $_POST['valoresGasto'];

        header("Location: ../ACTS/gastos_fixos.act.php");
        exit();
    } else {
        echo "<p class='alerta red'>Por favor, preencha todos os campos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Gastos Fixos</title>
    <link rel="stylesheet" href="../STYLE/adicaoGastos.css">
    <script>
        function adicionarGasto() {
            const container = document.getElementById('gastos-container');
            const novoGasto = `
                <div class="gasto-item">
                    <label>Nome do Gasto:</label>
                    <input type="text" name="Gastos[]" required><br>
                    <label>Valor do Gasto:</label>
                    <input type="number" name="valoresGasto[]" step="0.01" required><br>
                    <button type="button" onclick="removerGasto(this)">Remover Gasto</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', novoGasto);
        }

        function removerGasto(button) {
            button.parentElement.remove();
        }
    </script>
</head>
<body>
    <h1>Informe seus gastos fixos no mês</h1>
    <form method="POST">
        <div id="gastos-container">
            <div class="gasto-item">
                <label>Nome do Gasto:</label>
                <input type="text" name="Gastos[]" required><br>
                <label>Valor do Gasto:</label>
                <input type="number" name="valoresGasto[]" step="0.01" required><br>
            </div>
        </div>
        <button type="button" onclick="adicionarGasto()">Adicionar Mais Gastos</button>
        <button type="submit">Salvar Gastos</button>
    </form>
</body>
</html>
