<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Armazena as dívidas, valores, juros e tempo na sessão
    $_SESSION['dividas'] = $_POST['dividas'];
    $_SESSION['valores'] = $_POST['valores'];
    $_SESSION['juros'] = $_POST['juros'];
    $_SESSION['tempo'] = $_POST['tempo'];
    $_SESSION['saldo'] = $_POST['saldo'];
    // Redireciona para a próxima página
    header("Location: ../PAGES/confirmacaoInf.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preencha as Dívidas</title>
    <script>
        // Função para adicionar mais campos de dívidas
        function adicionarDivida() {
            const dividasContainer = document.getElementById('dividas-container');
            const novaDivida = `
                <div class="divida-item">
                    <label>Nome da Dívida:</label>
                    <input type="text" name="dividas[]" required><br>
                    <label>Valor da Dívida:</label>
                    <input type="number" name="valores[]" step="0.01" required><br>
                    <label>Juros da Dívida (%):</label>
                    <input type="number" name="juros[]" step="0.01" required><br>
                    <label>Tempo da Dívida (meses):</label>
                    <input type="number" name="tempo[]" required id="tempo-input"><br>
                    <label>Dívida Ilimitada:</label>
                    <input type="checkbox" onchange="toggleTempo(this)"><br><br>
                    <input type="hidden" name="tempo_ilimitada[]" value="9999"> <!-- Campo oculto -->
                </div>
            `;
            dividasContainer.insertAdjacentHTML('beforeend', novaDivida);
        }

        // Função para desativar o campo de tempo se a dívida for ilimitada
         // Função para desativar o campo de tempo se a dívida for ilimitada
    function toggleTempo(checkbox) {
        const inputTempo = checkbox.parentElement.querySelector('#tempo-input');
        const hiddenTempo = checkbox.parentElement.querySelector('input[name="tempo_ilimitada[]"]');

        if (checkbox.checked) {
            inputTempo.disabled = true; // Desativa o campo de entrada
            inputTempo.value = ""; // Limpa o valor digitado pelo usuário
            hiddenTempo.value = 9999; // Define o valor oculto como 9999
        } else {
            inputTempo.disabled = false; // Ativa o campo de entrada
            hiddenTempo.value = ""; // Limpa o valor oculto
        }
    }
    </script>
</head>
<body>
    <h1>Informe suas Dívidas</h1>

    <form method="POST">
        <div>
            <h1>Informe seu saldo:</h1>
            <input type="text" name="saldo" required><br>
        </div>
        <div id="dividas-container">
            <div class="divida-item">
                <label>Nome da Dívida 1:</label>
                <input type="text" name="dividas[]" required><br>
                <label>Valor da Dívida 1:</label>
                <input type="number" name="valores[]" step="0.01" required><br>
                <label>Juros da Dívida 1 (%):</label>
                <input type="number" name="juros[]" step="0.01" required><br>
                <label>Tempo da Dívida (meses):</label>
                <input type="number" name="tempo[]" required id="tempo-input"><br>
                <label>Dívida Ilimitada:</label>
                <input type="checkbox" onchange="toggleTempo(this)"><br><br>
                <input type="hidden" name="tempo_ilimitada[]" value=""> <!-- Campo oculto -->
            </div>
        </div>

        <button type="button" onclick="adicionarDivida()">Adicionar Mais Dívidas</button><br><br>
        <button type="submit">Próximo</button>
    </form>
</body>
</html>
