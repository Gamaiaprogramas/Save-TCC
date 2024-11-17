<?php
// Inicia a sessão
session_start();
include("../partials/header.php");
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
                        <h1>Saldo</h1>
                    </div>
                    <div class="propGasto">
                        <h1>R$<?php echo number_format($saldo, 2, ',', '.'); ?></h1>
                    </div>
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
            <h1>Dividas <a>!</a></h1>
        </div>
        <div class="espacoBtnDividas">
            <div class="btnDividas">
                <a>Exibir Dividas<a class="laranja">Pagas</a><i class="fa-solid fa-chevron-down"></i></a>
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
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            // Create chart
            var chart = root.container.children.push(am5percent.PieChart.new(root, {
                layout: root.verticalLayout
            }));

            // Create series
            var series = chart.series.push(am5percent.PieSeries.new(root, {
                valueField: "value",
                categoryField: "category"
            }));

            // Set data
            series.data.setAll([
                { value: <?php echo $total_dividas; ?>, category: "Dívidas" },
                { value: <?php echo $total_gastos; ?>, category: "Gastos Fixos" },
                { value: <?php echo $saldo; ?>, category: "Saldo" }
            ]);

            // Add tooltip
            series.slices.template.set("tooltipText", "{category}: [bold]{value}[/]");

            // Play initial series animation
            series.appear(1000, 100);
        }); // end am5.ready()
        </script>

        <div class="espacoBtnDivida">
            <a href="../PAGES/adicionar_novo.php" class="btnAdicionarDivida">Adicionar Dívida <i class="fa-solid fa-circle-plus"></i></a>
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
        </div>

        <!-- Estilização da nova seção de dívidas pagas -->
        <style>
            .tituloDividasPagas {
                margin-top: 20px;
            }
            .containerDividasPagas {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
                justify-content: center;
                padding: 20px;
            }
            .cardDividaPaga {
                background-color: #e0e0e0;
                padding: 15px;
                border-radius: 8px;
                width: 250px;
                text-align: center;
                color: #333;
            }
            .btnDividaPaga {
                background-color: #28a745;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 5px;
                cursor: not-allowed;
            }
        </style>



    </div>
    
</body>
</html>
