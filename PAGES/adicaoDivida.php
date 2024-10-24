<?php

require("../ACTS/sec.php");


    //mensagem
    $intervalo = range(1, 5);

    // Exibindo o intervalo
    foreach ($intervalo as $numero) {
        @session_start();
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
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
                <div class="centro">
                    <div class="esquerda">
                        <div>
                            <label><span>Nome</span> da Dívida:</label>
                        </div>
                        <div>
                            <label><span>Valor </span>da Dívida:</label>
                        </div>
                        <div>
                            <label><span>Juros </span>da Dívida (%):</label>
                        </div>
                        <div>
                            <label><span>Tempo </span>da Dívida (meses):</label>
                        </div>
                        <div>
                            <label><span>Dívida </span>Parcelável?</label>
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
                            <input type="number" name="tempo[]" required id="tempo-input"><br>
                        </div>
                        <div class="check">
                        <input type="checkbox" onchange="toggleTempo(this)"><br><br>
                    <input type="hidden" name="tempo_ilimitada[]" value="9999"> <!-- Campo oculto -->
                        </div>
                    </div>
                </div>  
                
            

                <button class="learn-more" onclick="removerDivida(this)">
                    <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                    </span>
                    <span class="button-text">Excluir Dívida</span>
                    
                </button>

            </div>
            `;
            dividasContainer.insertAdjacentHTML('beforeend', novaDivida);
        }

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

        // Função para remover um campo de dívida
        function removerDivida(button) {
            const dividaItem = button.parentElement; // Seleciona o container da dívida
            dividaItem.remove(); // Remove o container da dívida
        }

        
    </script>
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

    <h1>Informe suas Dívidas</h1>

    <form id="dividaForm" method="POST" action="../ACTS/dividas.act.php">
    <div id="dividas-container">
        <div class="divida-item">
            <div class="centro">
                <div class="esquerda">
                    <div>
                        <label><span>Nome</span> da Dívida:</label>
                    </div>
                    <div>
                        <label><span>Valor </span>da Dívida:</label>
                    </div>
                    <div>
                        <label><span>Juros </span>da Dívida (%):</label>
                    </div>
                    <div>
                        <label><span>Tempo </span>da Dívida (meses):</label>
                    </div>
                    <div>
                        <label><span>Dívida </span>Parcelável?</label>
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
                        <input type="number" name="tempo[]" required id="tempo-input"><br>
                    </div>
                    <div class="check">
                        <input type="checkbox" onchange="toggleTempo(this)"><br><br>
                        <input type="hidden" name="tempo_ilimitada[]" value="">
                    </div>
                </div>
            </div>
            <button class="Btn" onclick="removerDivida(this)">
  
                <div class="sign">
                <svg
  xmlns="http://www.w3.org/2000/svg"
  width="50"
  height="50"
  viewBox="0 0 24 24"
>
  <rect x="4" y="7" width="16" height="14" rx="2" fill="#ccc" />
  <path d="M4 7h16V5H4v2z" fill="#999" />
  <path d="M10 2h4v2h-4z" fill="#777" />
  <path d="M8 10h8v10H8z" fill="#fff" />
  <rect x="6" y="9" width="12" height="1" fill="#777" />
  <path d="M6 6h12v1H6z" fill="#777" />
  <path d="M8 9h1v1H8zm7 0h1v1h-1z" fill="#777" />
</svg>
                </div>
  
                <div class="text">Apagar dívida</div>
            </button>


        </div>
    </div>
    <button type="button" onclick="adicionarDivida()">Adicionar Mais Dívidas</button><br><br>
    
    <button type="button" class="btnProx" onclick="confirmarEnvio()" >
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
</form>


<div id="overlay">
    <div id="confirmacao">
        <p>Você está certa com as informações fornecidas?</p>
        <button class="button" id="simBtn">Sim</button>
        <button class="button cancel" id="naoBtn">Não</button>
    </div>
</div>
<script src="../JS/geral.js"></script>
<script>
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
        document.getElementById('overlay').style.display = 'block'; // Exibe o overlay
    } else {
        alert("Por favor, preencha todos os campos obrigatórios."); // Alerta se algum campo estiver vazio
    }
}

document.getElementById('naoBtn').onclick = function() {
    document.getElementById('overlay').style.display = 'none'; // Fecha o overlay
}

document.getElementById('simBtn').onclick = function() {
    document.getElementById('dividaForm').submit(); // Envia o formulário
}
</script>

</body>
</html>
