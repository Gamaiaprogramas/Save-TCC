<?php
// Inicia a sessão
session_start();
require("../partials/headeralternative.php"); 
require("../ACTS/sec_dashboard.php");

// Conexão com o banco de dados
include("../ACTS/connect.php");

// Obter dados do usuário logado
$id_user = $_SESSION['Id_user'];

// Consultar dados do saldo, dívidas e gastos
$query_saldo = "SELECT saldo FROM informacao WHERE Id_User = '$id_user'";
$query_dividas = "SELECT Nomes_Dividas, Valores_Dividas, Juros_Dividas, Tempo_Dividas FROM informacao WHERE Id_User = '$id_user'";
$query_gastos = "SELECT Nomes_gastos, Valores_gastos FROM gastosfix WHERE Id_User = '$id_user'";


// Executar consultas
$result_saldo = mysqli_query($con, $query_saldo);
$result_dividas = mysqli_query($con, $query_dividas);
$result_gastos = mysqli_query($con, $query_gastos);

$query_reserva = "SELECT valor_reserva FROM informacao WHERE Id_User = '$id_user'";


$result_reserva = mysqli_query($con, $query_reserva);
$ValorResultado = mysqli_fetch_assoc($result_reserva);
$nivelBusca = mysqli_query($con, "SELECT nivel FROM `informacao` WHERE `Id_user` = '$id_user'");
$buscaResult = mysqli_fetch_assoc($nivelBusca);
$ValorRultadoReal = $ValorResultado['valor_reserva'];

$nivel2 = $buscaResult['nivel']; // Corrigir para acessar o valor da chave 'nivel'



// Verificar se as consultas retornaram resultados
if ($result_saldo) {
    $saldo = mysqli_fetch_assoc($result_saldo)['saldo'];
} else {
    $saldo = 0;
}

if ($result_dividas) {
    $dividas = mysqli_fetch_assoc($result_dividas);
    $nomes_dividas = explode(",", $dividas['Nomes_Dividas']);
    $valores_dividas = explode(",", $dividas['Valores_Dividas']);
    $juros_dividas = explode(",", $dividas['Juros_Dividas']);
    $tempo_dividas = explode(",", $dividas['Tempo_Dividas']);

    // Somar apenas as dívidas ativas
    $total_dividas = 0;
    for ($i = 0; $i < count($nomes_dividas); $i++) {
        if (intval($tempo_dividas[$i]) > 0 || intval($tempo_dividas[$i]) == 9999) {
            $total_dividas += floatval($valores_dividas[$i]);
        }
    }
} else {
    $total_dividas = 0;
}


if ($result_gastos) {
    $gastos = mysqli_fetch_assoc($result_gastos);
    $nomes_gastos = explode(",", $gastos['Nomes_gastos']);
    $valores_gastos = explode(",", $gastos['Valores_gastos']);
    $total_gastos = array_sum(array_map('floatval', $valores_gastos));
} else {
    $total_gastos = 0;
}

// Calcular o total em relação ao salário
$total = floatval($saldo) + $total_dividas + $total_gastos;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Financeira</title>
    <link rel="stylesheet" href="../STYLE/dashboard.css">
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="../JS/jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="dashboard-container">
        <div class="tituloDash">
            <h1>Bem vindo(a) a sua <a>Dashboard</a>!</h1>
        </div>
        <div class="infoGastos">
            <div class="esquerdaInfo">
                <div id="chartdiv"></div>
            </div>
            <div class="direitaInfo">
                <div class="divGastos">
                    <div class="iconeGastos">
                        <img src="../PICS/imgsSelecao/imgNotas.svg" alt="Imagem Notas" class="produto">
                    </div>
                    <div class="nomeGasto">
                        <h1>Ganho mensal</h1>
                    </div>
                    <div class="propGasto">
                        <h1>R$<?php echo number_format($saldo, 2, ',', '.'); ?></h1>
                    </div>
                    <button id ="buton">Alterar Salário <i class="fa-solid fa-pen"></i></button>
                </div>
                <div class="divGastos">
                    <div class="iconeGastos">
                        <img src="../PICS/imgsSelecao/imgNotas.svg" alt="Imagem Notas" class="produto">
                    </div>
                    <div class="nomeGasto">
                        <h1>Despesas</h1>
                    </div>
                    <div class="propGasto">
                        <h1>R$<?php echo number_format($total_dividas, 2, ',', '.'); ?></h1>
                    </div>
                </div>
                <div class="divGastos">
                    <div class="iconeGastos">
                        <img src="../PICS/imgsSelecao/imgNotas.svg" alt="Imagem Notas" class="produto">
                    </div>
                    <div class="nomeGasto">
                        <h1>Gastos Fixos</h1>
                    </div>
                    <div class="propGasto">
                        <h1>R$<?php echo number_format($total_gastos, 2, ',', '.'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tituloDividas">
            <h1>Dívidas <a>!</a></h1>
        </div>
        <div class="espacoBtnDividas">
            <div class="btnDividas">
                <a>Exibir Dívidas<a class="laranja">Pagas</a><i class="fa-solid fa-chevron-down"></i></a>
                <div class="subDividas">
                    <div class="espacoCimaDividas">
                        <a>Nome</a>
                        <a>Valor</a>
                        <a>Status</a>
                    </div>
                    <div class="espacoBaixoDividas">
                        <?php for ($i = 0; $i < count($nomes_dividas); $i++): ?>
                            <?php if (intval($tempo_dividas[$i]) == 0): ?>
                                <div class="linhaDivida">
                                    <div class="divnomeDivida">
                                    <p><strong><?php echo htmlspecialchars($nomes_dividas[$i]); ?></strong></p>
                                    </div>
                                    <div class="divValorDivida">
                                        <p><?php echo number_format(floatval($valores_dividas[$i]), 2, ',', '.'); ?></p>
                                    </div>
                                    <div class="divStatusDivida">
                                        <p>Paga</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="espacoDividas">
            <div class="espacoBtnEsquerda">
                <button class="btnEsquerda" onclick="direcao(1)"><i class="fa-solid fa-arrow-left fa-2xl"></i></button>
            </div>
            <div class="containerDividas">
                <?php for ($i = 0; $i < count($nomes_dividas); $i++): ?>
                    <?php if (intval($tempo_dividas[$i]) > 0 || intval($tempo_dividas[$i]) == 9999): ?>
                        <div class="cardDivida">
                            <div class="nomeDivida">
                                <p><strong><?php echo htmlspecialchars($nomes_dividas[$i]); ?></strong></p>
                            </div>
                            <div class="valorDivida">
                                <p>Valor: R$ <?php echo number_format(floatval($valores_dividas[$i]), 2, ',', '.'); ?></p>
                            </div>
                            <div class="jurosDivida">
                                <p>Juros: <?php echo htmlspecialchars($juros_dividas[$i]); ?>%</p>
                            </div>
                            <div class="tempoDivida">
                                <p>Tempo: <?php 
                                    if (intval($tempo_dividas[$i]) == 9999) {
                                        echo "Pagamento Único";
                                    } else {
                                        echo htmlspecialchars($tempo_dividas[$i]) . " meses";
                                    }
                                ?></p>
                            </div>
                            <form method="post" action="../ACTS/pagar_divida.php">
                                <input type="hidden" name="debt_index" value="<?php echo $i; ?>">
                                <input type="hidden" name="tempo_dividas" value="<?php echo intval($tempo_dividas[$i]); ?>">
                                <div class="btnDivida">
                                    <button class="botaoDivida" type="submit">Pagar Parcela</button>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="espacoBtnDireita">
                <button class="btnDireita" onclick="direcao(2)"><i class="fa-solid fa-arrow-right fa-2xl"></i></button>
            </div>
        </div>
        <script>
            function direcao(e){
                var direcao = document.querySelector(".containerDividas");
                if(e == 1){
                    direcao.scrollLeft = direcao.scrollLeft - 1550;
                }else if (e == 2){
                    direcao.scrollLeft = direcao.scrollLeft + 1550;
                }
            }
        </script>
         <script>
am5.ready(function() {
    // Create root element
    var root = am5.Root.new("chartdiv");

    // Set themes
    root.setThemes([am5themes_Animated.new(root)]);

    // Create chart
    var chart = root.container.children.push(am5percent.PieChart.new(root, {
        layout: root.verticalLayout
    }));

    // Create series
    var series = chart.series.push(am5percent.PieSeries.new(root, {
        valueField: "value",
        categoryField: "category"
    }));

    // Set data dynamically from PHP
    series.data.setAll([
        { value: <?php echo $total_dividas; ?>, category: "Dívidas" },
        { value: <?php echo $total_gastos; ?>, category: "Gastos Fixos" },
        { value: <?php echo $saldo; ?>, category: "Saldo" }
    ]);

    // Create color set with custom colors
    var colorSet = am5.ColorSet.new(root, {
        colors: [am5.color("#ff6d00"), am5.color("#10002b"), am5.color("#ffc107")]
    });
    series.set("colors", colorSet);

    // Add tooltip
    series.slices.template.set("tooltipText", "{category}: [bold]{value}[/]");

    // Play initial series animation
    series.appear(1000, 100);
});


        </script>

        <div class="espacoBtnDivida">
            <div><a href="../PAGES/adicionar_novo.php" class="btnAdicionarDivida">Adicionar Dívida <i class="fa-solid fa-circle-plus"></i></a></div>
            <button id="butonDivida">Alterar Dívida <i class="fa-solid fa-pen"></i></button>
        </div>

        <div class="tituloFixo">
            <h1>Gastos <a>Fixos</a>!</h1>
        </div>
        <div class="containerFixo">
            <?php for ($i = 0; $i < count($nomes_gastos); $i++): ?>
                <div class="cardFixo">
                    <div class="nomeFixo">
                        <p><strong><?php echo htmlspecialchars($nomes_gastos[$i]); ?></strong></p>
                    </div>
                    <div class="valorFixo">
                        <p>Valor: R$ <?php echo number_format(floatval($valores_gastos[$i]), 2, ',', '.'); ?></p>
                    </div>
                </div>
            <?php endfor; ?>
            <!-- Card de Adicionar Gasto -->
                       <!-- Card de Adicionar Gasto -->
        </div>
        <div class="espacoBtnFixo">
            <a href="../PAGES/adicionar_gastos_fixos.php" class="btnAdicionarFixo">Adicionar Gasto <i class="fa-solid fa-circle-plus"></i></a>
            <button id= "butonGasto">Alterar Gasto <i class="fa-solid fa-pen"></i></button>
        </div>

        <!-- Estilização da nova seção de dívidas pagas -->

                <?php 
                if($nivel2 == 2 || $nivel2 == 3){
                    echo "
                    <style>
                    
                    .planFinanceiro{
                    display : block;
                    }
                    .caixinhaSonhos{
                    display : block;
;
                }
                    </style>";
                }else{
                    echo "
                    <style>
                    
                    .planFinanceiro{
                    display : none;
                    }
                    .caixinhaSonhos{
                    display : none;
                }
                    </style>";
                }
                ?>
            <style>
                .alterarDados{
                    display : none;
                }
            </style>

        <div class="planFinanceiro">
            <div class="tituloFinanceiro">
                <a>Reserva para o Futuro!</a>
            </div>
            <div class="textoFinanceiro">
                <a>Uma Reserva para o Futuro é um fundo financeiro criado para garantir segurança em longo prazo.</a>
                <a>Ela é formada por economias ou investimentos, visando cobrir necessidades futuras como</a>
                <a>aposentadoria, educação ou emergências. O objetivo é ter recursos disponíveis em momentos de</a>
                <a>imprevistos, proporcionando estabilidade e tranquilidade financeira.</a>            
            </div>
            <form action="../ACTS/reserva_emergencia.act.php" method="post">
                <label class="nomeReserva" for="reserva_input">Reserva Atual: <?php  echo $ValorRultadoReal ?></label>
                <input type="number" name="reserva_input">
                <input type="submit" value="Adicionar">
            </form>
        </div>

        <div class="caixinhaSonhos">
    <h2>Caixinha de Sonhos</h2>
    <!-- Formulário para criar novas metas -->
    <form action="../ACTS/caixinha_de_sonhos.act.php" method="post">
        <label for="nome_meta">Nome da Meta:</label>
        <input type="text" name="nome_meta" required>
        
        <label for="valor_meta">Valor da Meta:</label>
        <input type="number" name="valor_meta" step="0.01" required>
        
        <input type="submit" value="Criar Meta">
    </form>

    <!-- Lista de metas existentes -->
    <div class="metasExistentes">
        <h3>Suas Metas</h3>
        <?php
        // Consulta as metas do usuário
        $userId = $_SESSION['Id_user'];
        $query = "SELECT * FROM caixinha_sonhos WHERE user_id = $userId";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $percentual = ($row['valor_atual'] / $row['valor_meta']) * 100;
                $metaId = $row['id'];
                ?>
                <div class='meta'>
                    <p><strong><?php echo $row['nome_meta']; ?></strong></p>
                    <p>Progresso: <?php echo "{$row['valor_atual']} / {$row['valor_meta']}"; ?></p>
                    
                    <!-- Barra de progresso -->
                    <div class="progress-container">
                        <div class="progress-bar" id="progressBar-<?php echo $metaId; ?>" style="width: <?php echo $percentual; ?>%;"></div>
                    </div>

                    <!-- Formulário para depósito -->
                    <?php if ($row['valor_atual'] < $row['valor_meta']) { ?>
                        <form action="../ACTS/caixinha_deposito.php" method="post">
                            <input type="hidden" name="meta_id" value="<?php echo $metaId; ?>">
                            <input type="number" name="valor_deposito" step="0.01" required>
                            <input type="submit" value="Depositar">
                        </form>
                    <?php } else { ?>
                        <p class="meta-concluida">Meta concluída! 🎉</p>
                    <?php } ?>
                </div>
                <?php
            }
        } else {
            echo "<p>Você ainda não criou metas.</p>";
        }
        ?>
    </div>
</div>

<!-- Popup -->
<div id="popup" style="display: none;">
    <div class="popup-content">
        <p>Parabéns! Você atingiu sua meta!</p>
        <button onclick="closePopup()">Fechar</button>
    </div>
</div>

<script>
    function showPopup() {
    document.getElementById('popup').style.display = 'flex';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}


</script>




<script src="../JS/alterarDadosJs.js"></script>
<div class="alterarDados" id="idDivMae">
    <!-- Alterar Dívida -->
    <!-- Formulário para atualizar dívida -->
    <div class="tituloAtualizarDivida" id= "idDivida1">
    <h2>Atualizar <a>Dívida</a></h2>
</div>
<div class="formAtualizarDivida" id= "idDivida2">
    <form method="post" action="../ACTS/update_divida.php">
        <label for="index_divida">Escolha a dívida:</label>
        <select name="index_divida" id="index_divida" onchange="preencherCamposDivida()">
            <?php for ($i = 0; $i < count($nomes_dividas); $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo htmlspecialchars($nomes_dividas[$i]); ?></option>
            <?php endfor; ?>
        </select>

        <label for="novo_nome_divida">Nome Atual:</label>
        <input type="text" name="novo_nome_divida" id="novo_nome_divida" required>

        <label for="novo_valor_divida">Valor Atual:</label>
        <input type="text" name="novo_valor_divida" id="novo_valor_divida" required>

        <label for="novo_juros_divida">juros Atual:</label>
        <input type="text" name="novo_juros_divida" id="novo_juros_divida" required>

        <label for="novo_tempo_divida">Tempo Atual:</label>
        <input type="text" name="novo_tempo_divida" id="novo_tempo_divida" required>

        <button type="submit" class="btnAtualizar">Atualizar Dívida</button>
    </form>
</div>

<script>
    const nomesDividas = <?php echo json_encode($nomes_dividas); ?>;
    const valoresDividas = <?php echo json_encode($valores_dividas); ?>;
    const jurosDividas = <?php echo json_encode($juros_dividas); ?>;
    const tempoDividas = <?php echo json_encode($tempo_dividas); ?>;

    function preencherCamposDivida() {
        const index = document.getElementById("index_divida").value;
        document.getElementById("novo_nome_divida").value = nomesDividas[index];
        document.getElementById("novo_valor_divida").value = valoresDividas[index];
        document.getElementById("novo_juros_divida").value = jurosDividas[index];
        document.getElementById("novo_tempo_divida").value = tempoDividas[index];
    }

   
</script>


<!-- Formulário para atualizar gasto fixo -->
<div class="tituloAtualizarGasto"  id= "idGasto1" >
    <h2>Atualizar <a>Gasto Fixo</a></h2>
</div>
<div class="formAtualizarGasto" id= "idGasto2">
    <form method="post" action="../ACTS/update_gasto.php">
        <label for="index_gasto">Escolha o gasto fixo:</label>
        <select name="index_gasto" id="index_gasto" onchange="preencherCamposGasto()">
            <?php for ($i = 0; $i < count($nomes_gastos); $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo htmlspecialchars($nomes_gastos[$i]); ?></option>
            <?php endfor; ?>
        </select>

        <label for="novo_nome_gasto">Nome Atual:</label>
        <input type="text" name="novo_nome_gasto" id="novo_nome_gasto" required>

        <label for="novo_valor_gasto">Valor Atual:</label>
        <input type="number" name="novo_valor_gasto" id="novo_valor_gasto" required>

        <button type="submit" class="btnAtualizar">Atualizar Gasto</button>
    </form>
</div>

<script>
    const nomesGastos = <?php echo json_encode($nomes_gastos); ?>;
    const valoresGastos = <?php echo json_encode($valores_gastos); ?>;

    function preencherCamposGasto() {
        const index = document.getElementById("index_gasto").value;
        document.getElementById("novo_nome_gasto").value = nomesGastos[index];
        document.getElementById("novo_valor_gasto").value = valoresGastos[index];
    }


</script>


<!-- Formulário para atualizar saldo -->
<div class="formAtualizarSaldo" id= "idSaldo">

    <form method="post" action="../ACTS/update_saldo.php">
        <label for="novo_saldo">Novo Saldo:</label>
        <input type="number" name="novo_saldo" id="novo_saldo" step="0.01" required>

        <button type="submit" class="btnAtualizar">Atualizar Saldo</button>
    </form>
</div>

  
    </div>
    <button id="voltar" class="voltar">Voltar</button>

</body>
</html>
