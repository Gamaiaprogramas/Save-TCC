
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<style>
  header{
    background-color: #10002b !important;
    height: 7vw !important;
    margin: 0 !important;
    z-index: 1;
  }
</style>
<?php

    include("../partials/header.php");
  ?>
<link rel="stylesheet" href="../STYLE/cambio.css">
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



  
  <section class="cambiar-item">
    <div class="interfacea">
      <div class="img-itens">
        <img src="../PICS/imgs/ilustration-3.jpg" alt="">

      </div>
      <div class="txt-itens">
        <h3><span>O que é</span> Câmbio de<br>moedas</h3>
        <p>Save Your Money é uma empresa especializada em gestão financeira, dedicada a ajudar seus clientes a otimizar e proteger
        suas finanças pessoais e empresariais. Nosso objetivo é proporcionar uma abordagem estratégica e personalizada para o gerenciamento de dinheiro, 
        oferecendo orientação sobre orçamento, investimentos, e planejamento financeiro. Com uma equipe de especialistas comprometidos em transformar desafios 
        financeiros em oportunidades, a Save Your Money é a parceira ideal para aqueles que buscam um futuro financeiro mais seguro e eficiente.</p>
      </div>
      
    </div>

    <div class="card">
      <div class="titulo">
        <h1><p class="orange">Con</p>versor</h1>
        <h3 id="valor">BRL > USD</h3>
      </div>

    <input type="number" name="" id="num" placeholder="R$999,99">

    <select id="currencySelect" onchange="mudou()">
    <option value="USD">Dólar dos Estados Unidos (USD)</option>
    <option value="EUR">Euro (EUR)</option>
    <option value="JPY">Iene Japonês (JPY)</option>
    <option value="GBP">Libra Esterlina (GBP)</option>
    <option value="AUD">Dólar Australiano (AUD)</option>
    <option value="CAD">Dólar Canadense (CAD)</option>
    <option value="CHF">Franco Suíço (CHF)</option>
    <option value="CNY">Yuan Chinês (CNY)</option>
    <option value="NZD">Dólar Neozelandês (NZD)</option>
    <option value="INR">Rupia Indiana (INR)</option>
    <option value="MXN">Peso Mexicano (MXN)</option>
    <option value="SGD">Dólar de Cingapura (SGD)</option> 
    <option value="TRY">Lira Turca (TRY)</option>
    <option value="RUB">Rublo Russo (RUB)</option>
    <option value="ZAR">Rand Sul-Africano (ZAR)</option>
    <option value="SEK">Coroa Sueca (SEK)</option>
    <option value="NOK">Coroa Norueguesa (NOK)</option>
    <option value="AED">Dirham dos Emirados Árabes Unidos (AED)</option>
    <option value="ARS">Peso Argentino (ARS)</option>
    <option value="CLP">Peso Chileno (CLP)</option>
    <option value="HUF">Forint Húngaro (HUF)</option>
    <option value="ILS">Shekel Israelense (ILS)</option>
    <option value="MYR">Ringgit Malaio (MYR)</option>
    <option value="PHP">Peso Filipino (PHP)</option>
    <option value="PLN">Zloty Polonês (PLN)</option>
    <option value="THB">Baht Tailandês (THB)</option>
    <option value="LKR">Rupia do Sri Lanka (LKR)</option>
    <option value="RSD">Dinar Servo (RSD)</option>
    <option value="CZK">Coroa Tcheca (CZK)</option>
    <option value="MUR">Rupia Mauriciana (MUR)</option>
    <option value="KES">Xelim Queniano (KES)</option>
    <option value="BHD">Dinar Bareinita (BHD)</option>
    <option value="KWD">Dinar Kuwaitiano (KWD)</option>
    <option value="QAR">Riyal Catarense (QAR)</option>
    <option value="OMR">Rial Omanense (OMR)</option>
    <option value="JOD">Dinar Jordaniano (JOD)</option>
    <option value="BND">Dólar de Brunei (BND)</option>
    <option value="TWD">Novo Dólar de Taiwan (TWD)</option>
    <option value="PEN">Novo Sol Peruano (PEN)</option>
</select>
<input type="button" value="Calcular" onclick="calc()">
      <div class="result">
        <p id="rest">$</p>
      </div>
      <div id="data">
        <p>Carregando Data ... </p>
      </div>
    </div>
  </section>


  


    <div id="chartdiv"></div>

  <div></div>


<?php 

  include("../partials/footer.php");

?>
<script>window.onload = fetchExchangeRates;</script>