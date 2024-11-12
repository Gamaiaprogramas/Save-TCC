<?php
require("../ACTS/sec.php");

// Mensagem de sessão
@session_start();
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Dívidas</title>
    <link rel="stylesheet" href="../STYLE/acaoDivida.css"> <!-- Usando apenas o CSS da outra página -->
    <script>
        // Função para adicionar mais campos de dívidas
        function adicionarDivida() {
            const dividasContainer = document.getElementById('dividas-container');
            const novaDivida = `
                <div class="divida-item">
                    <label>Nome da Dívida: <input type="text" name="dividas[]" required></label>
                    <label>Valor da Dívida: <input type="number" name="valores[]" step="0.01" required></label>
                    <label>Juros (%): <input type="number" name="juros[]" step="0.01" required></label>
                    <label>Tempo (meses): <input type="number" name="tempo[]" required class="tempo-input"></label>
                    <label>Parcelável? <input type="checkbox" onchange="toggleTempo(this)"><input type="hidden" name="tempo_ilimitada[]" value=""></label>
                    <button type="button" class="btn-remove" onclick="removerDivida(this)">Remover</button>
                </div>`;
            dividasContainer.insertAdjacentHTML('beforeend', novaDivida);
        }

        // Função para desativar o campo de tempo se a dívida for ilimitada
        function toggleTempo(checkbox) {
            const inputTempo = checkbox.closest('.divida-item').querySelector('.tempo-input');
            const hiddenTempo = checkbox.closest('.divida-item').querySelector('input[name="tempo_ilimitada[]"]');
            if (checkbox.checked) {
                inputTempo.disabled = true;
                inputTempo.value = "";
                hiddenTempo.value = 9999;
            } else {
                inputTempo.disabled = false;
                hiddenTempo.value = "";
            }
        }

        // Função para remover um campo de dívida
        function removerDivida(button) {
            button.closest('.divida-item').remove();
        }

        // Função para confirmar envio
        function confirmarEnvio() {
            const form = document.getElementById('dividaForm');
            const inputs = form.querySelectorAll('input[required]');
            let allFilled = true;

            inputs.forEach(input => {
                if (!input.value) {
                    allFilled = false;
                }
            });

            if (allFilled) {
                document.getElementById('overlay').style.display = 'flex';
            } else {
                alert("Por favor, preencha todos os campos obrigatórios.");
            }
        }

        function fecharOverlay() {
            document.getElementById('overlay').style.display = 'none';
        }

        function submeterForm() {
            document.getElementById('dividaForm').submit();
        }
    </script>
</head>
<body>
<main class="container">
    <h1>Adicionar Dívidas</h1>

    <form id="dividaForm" method="POST" action="../ACTS/adicionar_novo.act.php">
        <div id="dividas-container">
            <div class="divida-item">
                <label>Nome da Dívida: <input type="text" name="dividas[]" required></label>
                <label>Valor da Dívida: <input type="number" name="valores[]" step="0.01" required></label>
                <label>Juros (%): <input type="number" name="juros[]" step="0.01" required></label>
                <label>Tempo (meses): <input type="number" name="tempo[]" required class="tempo-input"></label>
                <label>Parcelável? <input type="checkbox" onchange="toggleTempo(this)"><input type="hidden" name="tempo_ilimitada[]" value=""></label>
                <button type="button" class="btn-remove" onclick="removerDivida(this)">Remover</button>
            </div>
        </div>

        <div class="actions">
            <button type="button" class="btn-add" onclick="adicionarDivida()">Adicionar Mais Dívidas</button>
            <button type="button" class="btn-submit" onclick="confirmarEnvio()">Enviar</button>
        </div>
    </form>
</main>

<!-- Overlay de confirmação -->
<div id="overlay" style="display: none;">
    <div id="confirmacao">
        <p>Você está certo(a) com as informações fornecidas?</p>
        <button class="button" onclick="submeterForm()">Sim</button>
        <button class="button cancel" onclick="fecharOverlay()">Não</button>
    </div>
</div>

<script src="../JS/geral.js"></script>
</body>
</html>
