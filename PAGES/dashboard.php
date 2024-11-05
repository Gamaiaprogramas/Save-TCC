<?php
// Inicia a sessão
session_start();
include("../partials/header.php");

// Conexão com o banco de dados
include("../ACTS/connect.php");

// Obter dados do usuário logado
$id_user = $_SESSION['Id_user']; // Corrigido para o correto

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
    $saldo = 0; // Definindo um valor padrão
}

if ($result_dividas) {
    $dividas = mysqli_fetch_assoc($result_dividas);
    $nomes_dividas = explode(",", $dividas['Nomes_Dividas']);
    $valores_dividas = explode(",", $dividas['Valores_Dividas']);
    $juros_dividas = explode(",", $dividas['Juros_Dividas']);
    $tempo_dividas = explode(",", $dividas['Tempo_Dividas']);
    $total_dividas = array_sum(array_map('floatval', $valores_dividas));
} else {
    $total_dividas = 0; // Definindo um valor padrão
}

if ($result_gastos) {
    $gastos = mysqli_fetch_assoc($result_gastos);
    $nomes_gastos = explode(",", $gastos['Nomes_gastos']);
    $valores_gastos = explode(",", $gastos['Valores_gastos']);
    $total_gastos = array_sum(array_map('floatval', $valores_gastos));
} else {
    $total_gastos = 0; // Definindo um valor padrão
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
        <h1>Dashboard Financeira</h1>
        <h2>Saldo: R$ <?php echo number_format($saldo, 2, ',', '.'); ?></h2>
        <h2>Total de Dívidas: R$ <?php echo number_format($total_dividas, 2, ',', '.'); ?></h2>
        <h2>Total de Gastos Fixos: R$ <?php echo number_format($total_gastos, 2, ',', '.'); ?></h2>

        <div id="chartdiv"></div>

        <div class="cards-container">
            <h3>Dívidas</h3>
            <?php for ($i = 0; $i < count($nomes_dividas); $i++): ?>
                <div class="card">
                    <p><strong><?php echo htmlspecialchars($nomes_dividas[$i]); ?></strong></p>
                    <p>Valor: R$ <?php echo number_format(floatval($valores_dividas[$i]), 2, ',', '.'); ?></p>
                    <p>Juros: <?php echo htmlspecialchars($juros_dividas[$i]); ?>%</p>
                    <p>Tempo: <?php echo htmlspecialchars($tempo_dividas[$i]); ?></p>
                </div>
            <?php endfor; ?>
        </div>

        <div class="cards-container">
            <h3>Gastos Fixos</h3>
            <?php for ($i = 0; $i < count($nomes_gastos); $i++): ?>
                <div class="card">
                    <p><strong><?php echo htmlspecialchars($nomes_gastos[$i]); ?></strong></p>
                    <p>Valor: R$ <?php echo number_format(floatval($valores_gastos[$i]), 2, ',', '.'); ?></p>
                </div>
            <?php endfor; ?>
        </div>

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
    </div>
</body>
</html>
