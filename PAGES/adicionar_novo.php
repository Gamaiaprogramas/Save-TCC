<?php
session_start();
include("../partials/header.php");
require("../ACTS/sec.php");

// Mensagem de sessão
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
    <title>Save - Adicionar Dívida</title>
    <script>
        // Função para adicionar mais campos de dívidas
        function adicionarDivida() {
            const dividasContainer = document.getElementById('dividas-container');
            const novaDivida = `
            
                <div class="divida-item">
                    <div class="centro">
                        <div class="esquerda">
                            <div>
                                <label><span>Nome</span> da Dívida:</label>
                            </div>
                            <div>
                                <label><span>Valor</span> da Dívida:</label>
                            </div>
                            <div>
                                <label><span>Juros</span> da Dívida (%):</label>
                            </div>
                            <div>
                                <label><span>Tempo</span> da Dívida (meses):</label>
                            </div>
                        </div>
                        <div class="direita">
                            <div>
                                <input type="text" name="dividas[]" required><br>
                            </div>
                            <div>
                                <input type="number" name="valores[]" step="0.01" required><br>
                            </div>
                            <div>
                                <input type="number" name="juros[]" step="0.01" required><br>
                            </div>
                            <div>
                                <input type="number" name="tempo[]" required class="tempo-input"><br>
                            </div>
                        </div>
                    </div>
                    <button class="Btn" onclick="removerDivida(this)">
                        <i class="fa-solid fa-minus fa-2xl" style="color: #ffffff;"></i>

                    </button>
                </div>`
        ;
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
    <link rel="stylesheet" href="../STYLE/acaoDivida.css">
    <style>
        header {
            position: relative !important;
            background-color: #10002b !important;
            height: 7vw !important;
            margin: 0 !important;
            z-index: 1;
        }
    </style>
</head>
<body>
    <h1>Adicionar Dívidas</h1>
    <form id="dividaForm" method="POST" action="../ACTS/adicionar_novo.act.php">
    <div id="dividas-container">
        <div class="divida-item">
            <div class="centro">
                <div class="esquerda">
                    <div>
                        <label><span>Nome</span> da Dívida:</label>
                    </div>
                    <div>
                        <label><span>Valor</span> da Dívida:</label>
                    </div>
                    <div>
                        <label><span>Juros</span> da Dívida (%):</label>
                    </div>
                    <div>
                        <label><span>Tempo</span> da Dívida (meses):</label>
                    </div>
                </div>
                <div class="direita">
                    <div>
                        <input type="text" name="dividas[]" required><br>
                    </div>
                    <div>
                        <input type="number" name="valores[]" step="0.01" required><br>
                    </div>
                    <div>
                        <input type="number" name="juros[]" step="0.01" required><br>
                    </div>
                    <div>
                        <input type="number" name="tempo[]" required class="tempo-input"><br>
                    </div>
                </div>
            </div>
            <button class="Btn" onclick="removerDivida(this)">
                <i class="fa-solid fa-minus fa-2xl" style="color: #ffffff;"></i>

            </button>
        </div>
    </div>
    
    <div class="espacoBtn">
        <button type="button" class="btnAdicionar" onclick="adicionarDivida()">Adicionar Mais Dívidas <i class="fa-solid fa-plus"></i></button>
    </div>
    
    <button type="button" class="btnProx" onclick="confirmarEnvio()">
        <span>Adicionar Divida</span>
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
</form>

<!-- Overlay de confirmação -->
<div id="overlay">
        <div id="confirmacao">
            <div class="nomeConfirmacao">
                <p>Revisadas todas as informações, deseja enviá-las?</p>
            </div>
            <div class="espacoConfirmacao">
                <button class="button2" onclick="submeterForm()">Sim</button>
                <button class="button cancel" onclick="fecharOverlay()">Não</button>
            </div>
        </div>
    </div>
<script src="../JS/geral.js"></script>
</body>
</html>
