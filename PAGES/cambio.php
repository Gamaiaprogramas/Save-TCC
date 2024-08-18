<link rel="stylesheet" href="../STYLE/cambio.css">

<?php
    include("../partials/header.php");

  ?>




    <div class="container">
        <h1>Taxas de Câmbio em Relação ao Real (BRL)</h1>
        <p id="usd">Carregando USD...</p>
        <p id="eur">Carregando EUR...</p>
        <p id="gbp">Carregando GBP...</p>
        <p id="jpy">Carregando JPY...</p>
    </div>



   
<?php 

  include("../partials/footer.php")

?>
<script>window.onload = fetchExchangeRates; </script>