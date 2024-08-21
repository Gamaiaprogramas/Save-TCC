<link rel="stylesheet" href="../STYLE/cambio.css">
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<?php
    include("../partials/header.php");
  ?>

<h1>Taxas de Câmbio em Relação ao Real (BRL)</h1>
  <div class="cambio">

    <div class="container">
    <div id="usd"><p>USD: Carregando...</p></div>
    <div id="eur"><p>EURO: Carregando...</p></div>
    <div id="gbp"><p>LIBRA: Carregando...</p></div>
    <div id="jpy"><p>IENE: Carregando...</p></div>
    <div id="cad"><p>Dólar Canadense: Carregando...</p></div>
    <div id="chf"><p>Franco Suíço: Carregando...</p></div>
    <div id="cny"><p>Yuan Chinês: Carregando...</p></div>
    <div id="sek"><p>Coroa Sueca: Carregando...</p></div>
    <div id="nzd"><p>Dólar Neozelandês: Carregando...</p></div>
    <div id="mxn"><p>Peso Mexicano: Carregando...</p></div>
    <div id="sgd"><p>Dólar de Singapura: Carregando...</p></div>


    </div>
        
  </div>


    <div id="chartdiv"></div>


<?php 

  include("../partials/footer.php")

?>
<script>window.onload = fetchExchangeRates; </script>