<link rel="stylesheet" href="../STYLE/cambio.css">
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<?php
    include("../partials/header.php");
  ?>


  <div class="cambio">

    <div class="container">
        <h1>Taxas de Câmbio em Relação ao Real (BRL)</h1>
        <p id="usd">Carregando USD...</p>
        <p id="eur">Carregando EUR...</p>
        <p id="gbp">Carregando GBP...</p>
        <p id="jpy">Carregando JPY...</p>
    </div>


    <div id="chartdiv"></div>


  </div>
<?php 

  include("../partials/footer.php")

?>
<script>window.onload = fetchExchangeRates; </script>