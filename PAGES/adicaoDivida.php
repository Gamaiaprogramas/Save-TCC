<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Armazena as dívidas, valores, juros, tempo e saldo na sessão
    $_SESSION['dividas'] = $_POST['dividas'];
    $_SESSION['valores'] = $_POST['valores'];
    $_SESSION['juros'] = $_POST['juros'];

    // Substitui o valor do tempo por 9999 caso a dívida seja ilimitada
    $tempos = $_POST['tempo'];
    foreach ($_POST['tempo_ilimitada'] as $key => $ilimitada) {
        if ($ilimitada === '9999') {
            $tempos[$key] = 9999; // Substitui o valor do tempo
        }
    }
    $_SESSION['tempo'] = $tempos;
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
                <div class="centro">
                    <div class="esquerda">
                        <div>
                            <label><span>Nome</span> da Dívida 1:</label>
                        </div>
                        <div>
                            <label><span>Valor </span>da Dívida 1:</label>
                        </div>
                        <div>
                            <label><span>Juros </span>da Dívida 1 (%):</label>
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

    <form method="POST">

        <div id="dividas-container">
            <div class="divida-item">
                <div class="centro">
                    <div class="esquerda">
                        <div>
                            <label><span>Nome</span> da Dívida 1:</label>
                        </div>
                        <div>
                            <label><span>Valor </span>da Dívida 1:</label>
                        </div>
                        <div>
                            <label><span>Juros </span>da Dívida 1 (%):</label>
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
        </div>

        <button type="button" onclick="adicionarDivida()">Adicionar Mais Dívidas</button><br><br>
        <button type="submit">Próximo</button>
    </form>
</body>
</html>
