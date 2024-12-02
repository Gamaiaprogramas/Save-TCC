<?php
session_start();



// Mensagem
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Gastos']) && isset($_POST['valoresGasto'])) {
        $_SESSION['Gastos'] = $_POST['Gastos'];
        $_SESSION['valoresGasto'] = $_POST['valoresGasto'];

        header("Location:../ACTS/gastos_fixos.act.php");
        exit();
    } else {
        echo "<p class='alerta red'>Por favor, preencha todos os campos.</p>";
    }
}include("../partials/header.php");
require('../ACTS/connect.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save - Adicionar Gastos</title>
    <script>
        function adicionarGasto() {
            const container = document.getElementById('dividas-container');
            const novoGasto = `
                <div class="divida-item">
            <div class="centro">
                <div class="esquerda">
                    <div>
                        <label><span>Nome</span> do Gasto:</label>
                    </div>
                    <div>
                        <label><span>Valor </span>do Gasto:</label>
                    </div>
                </div>
                <div class="direita">
                    <div>
                        <input type="text" name="Gastos[]" required><br>
                    </div>
                    <div>
                        <input type="number" name="valoresGasto[]" step="0.01" required><br>
                    </div>
                </div>
            </div>
            <button class="Btn" onclick="removerGasto(this)">
                <div class="sign">
                    <i class="fa-solid fa-minus fa-2xl" style="color: #ffffff;"></i>
                </div>
                <div class="text">Apagar dívida</div>
            </button>
        </div>
            `;
            container.insertAdjacentHTML('beforeend', novoGasto);
        }

        function removerGasto(button) {
            button.parentElement.remove();
        }
    </script>
    <link rel="stylesheet" href="../STYLE/adicaoGastos.css">
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
    <h1>Adicione seus gastos fixos do mês!</h1>
    <form id="GastosForm" method="POST">  
    <div id="dividas-container">
        <div class="divida-item">
            <div class="centro">
                <div class="esquerda">
                    <div>
                        <label><span>Nome</span> do Gasto:</label>
                    </div>
                    <div>
                        <label><span>Valor </span>do Gasto:</label>
                    </div>
                </div>
                <div class="direita">
                    <div>
                        <input type="text" name="Gastos[]" required><br>
                    </div>
                    <div>
                        <input type="number" name="valoresGasto[]" step="0.01" required><br>
                    </div>
                </div>
            </div>
            <button class="Btn" onclick="removerGasto(this)">
                <div class="sign">
                    <i class="fa-solid fa-minus fa-2xl" style="color: #ffffff;"></i>
                </div>
                <div class="text">Apagar dívida</div>
            </button>
        </div>
    </div>
    <div class="espacoBtn">
        <button type="button" class="btnAdicionar" onclick="adicionarGasto()">Adicionar Mais Gastos <i class="fa-solid 1 fa-plus"></i></button>
    </div>
    
    <button type="button" class="btnProx" onclick="confirmarEnvio()" >
        <span>Salvar Gastos</span>
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
    <div id="overlay">
        <div id="confirmacao">
            <p>Você está certa com as informações fornecidas?</p>
            <button class="button" id="simBtn">Sim</button>
            <button class="button cancel" id="naoBtn">Não</button>
        </div>
    </div>
</form>
    <script>
    function confirmarEnvio() {
        const form = document.getElementById('GastosForm');
        const inputs = form.querySelectorAll('input[required]');
        let allFilled = true;

        inputs.forEach(input => {
            if (!input.value) {
                allFilled = false;
            }
        });

        if (allFilled) {
            document.getElementById('overlay').style.display = 'block'; // Exibe o overlay
        } else {
            alert("Por favor, preencha todos os campos obrigatórios."); // Alerta se algum campo estiver vazio
        }
    }

    document.getElementById('naoBtn').onclick = function() {
        document.getElementById('overlay').style.display = 'none'; // Fecha o overlay
    }

    document.getElementById('simBtn').onclick = function() {
        document.getElementById('GastosForm').submit(); // Envia o formulário
    }
    </script>
</body>
</html>
