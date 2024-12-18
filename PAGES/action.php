<?php
 @session_start();
 if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>
<title>Save - Ações</title>
<link rel="stylesheet" href="../STYLE/action.css">
<style>
  header{
    height: 140px !important;
    background-color: #10002b !important;
    position: relative !important;
  }
</style>
<?php
    include("../partials/header.php");
  ?>
    <div class="container">
        <div class="left">
            <h1>Consulta de ação</h1>

            <div class= "container">
                <div class="select">
                    <select id="stockSelect" onchange="change()" size= "24">
                        <optgroup label="Tecnologia">
                            <option value="AAPL">Apple Inc. (AAPL)</option>
                            <option value="MSFT">Microsoft Corp. (MSFT)</option>
                            <option value="GOOGL">Alphabet Inc. (GOOGL)</option>
                            <option value="AMZN">Amazon.com Inc. (AMZN)</option>
                            <option value="META">Meta Platforms Inc. (META)</option>
                            <option value="TSLA">Tesla Inc. (TSLA)</option>
                            <option value="NVDA">NVIDIA Corp. (NVDA)</option>
                            <option value="INTC">Intel Corp. (INTC)</option>
                            <option value="ADBE">Adobe Inc. (ADBE)</option>
                            <option value="CRM">Salesforce.com Inc. (CRM)</option>
                        </optgroup>
                
                        <optgroup label="Finanças">
                            <option value="JPM">JPMorgan Chase & Co. (JPM)</option>
                            <option value="BAC">Bank of America Corp. (BAC)</option>
                            <option value="WFC">Wells Fargo & Co. (WFC)</option>
                            <option value="GS">Goldman Sachs Group Inc. (GS)</option>
                            <option value="C">Citigroup Inc. (C)</option>
                            <option value="MS">Morgan Stanley (MS)</option>
                            <option value="V">Visa Inc. (V)</option>
                            <option value="MA">Mastercard Inc. (MA)</option>
                            <option value="AXP">American Express Co. (AXP)</option>
                            <option value="PYPL">PayPal Holdings Inc. (PYPL)</option>
                        </optgroup>
                
                        <optgroup label="Saúde">
                            <option value="JNJ">Johnson & Johnson (JNJ)</option>
                            <option value="PFE">Pfizer Inc. (PFE)</option>
                            <option value="MRK">Merck & Co. Inc. (MRK)</option>
                            <option value="ABBV">AbbVie Inc. (ABBV)</option>
                            <option value="BMY">Bristol-Myers Squibb Co. (BMY)</option>
                            <option value="GILD">Gilead Sciences Inc. (GILD)</option>
                            <option value="LLY">Eli Lilly and Co. (LLY)</option>
                            <option value="AMGN">Amgen Inc. (AMGN)</option>
                            <option value="UNH">UnitedHealth Group Inc. (UNH)</option>
                            <option value="CI">Cigna Corp. (CI)</option>
                        </optgroup>
                
                        <optgroup label="Consumo">
                            <option value="KO">The Coca-Cola Company (KO)</option>
                            <option value="PEP">PepsiCo Inc. (PEP)</option>
                            <option value="PG">Procter & Gamble Co. (PG)</option>
                            <option value="UL">Unilever PLC (UL)</option>
                            <option value="CL">Colgate-Palmolive Co. (CL)</option>
                            <option value="MCD">McDonald's Corp. (MCD)</option>
                            <option value="NKE">Nike Inc. (NKE)</option>
                            <option value="COST">Costco Wholesale Corp. (COST)</option>
                            <option value="WMT">Wal-Mart Stores Inc. (WMT)</option>
                            <option value="SBUX">Starbucks Corp. (SBUX)</option>
                        </optgroup>
                
                        <optgroup label="Energia">
                            <option value="XOM">Exxon Mobil Corp. (XOM)</option>
                            <option value="CVX">Chevron Corp. (CVX)</option>
                            <option value="COP">ConocoPhillips (COP)</option>
                            <option value="BP">BP PLC (BP)</option>
                            <option value="RDS.A">Royal Dutch Shell PLC (RDS.A)</option>
                            <option value="TOT">TotalEnergies SE (TOT)</option>
                            <option value="ENB">Enbridge Inc. (ENB)</option>
                            <option value="OXY">Occidental Petroleum Corp. (OXY)</option>
                            <option value="EOG">EOG Resources Inc. (EOG)</option>
                            <option value="PXD">Pioneer Natural Resources Co. (PXD)</option>
                        </optgroup>
                
                        <optgroup label="Telecomunicações">
                            <option value="T">AT&T Inc. (T)</option>
                            <option value="VZ">Verizon Communications Inc. (VZ)</option>
                            <option value="TMUS">T-Mobile US Inc. (TMUS)</option>
                            <option value="CMCSA">Comcast Corp. (CMCSA)</option>
                            <option value="CHTR">Charter Communications Inc. (CHTR)</option>
                            <option value="S">Sprint Corp. (S)</option>
                            <option value="DISH">Dish Network Corp. (DISH)</option>
                            <option value="ATUS">Altice USA Inc. (ATUS)</option>
                            <option value="FTR">Frontier Communications Corp. (FTR)</option>
                            <option value="LVLT">Level 3 Communications Inc. (LVLT)</option>
                        </optgroup>
                
                        <optgroup label="Diversos">
                            <option value="BRK.A">Berkshire Hathaway Inc. (BRK.A)</option>
                            <option value="TSLA">Tesla Inc. (TSLA)</option>
                            <option value="DIS">The Walt Disney Company (DIS)</option>
                            <option value="NFLX">Netflix Inc. (NFLX)</option>
                            <option value="IBM">IBM Corp. (IBM)</option>
                            <option value="GE">General Electric Co. (GE)</option>
                            <option value="GM">General Motors Co. (GM)</option>
                            <option value="F">Ford Motor Co. (F)</option>
                            <option value="CAT">Caterpillar Inc. (CAT)</option>
                            <option value="MMM">3M Company (MMM)</option>
                        </optgroup>
                    </select>
                </div>
            </div> 
        </div>

        <div class="center">

            <div class="nome">
                <div class="bloco">
                    <h1 id="nm">Nome</h1>
                    <div class="preco">
                    <p id="preco">R$</p>
                    </div>
                    <h2>Valor Atual</h2>
                </div>
            </div>
            <div class="value">
                <div class="menor">
                    
                    <div class="mnpreco">
                        <p id="mndia">R$</p>
                    </div>
                    <h2>Menor Valor Do Dia</h2>
                </div>
                <div class="maior">
                    
                    <div class="mrpreco">
                    <p id="mxdia">R$</p>
                    </div>
                    <h2>maior Valor Do Dia</h2>
                </div>
           </div>
        </div>

        <div class="right">
          <h1>O que são ações</h1>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/jtgEN3EO1h4?si=6ibY7OP9I777Yufy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          <p>
            Se você está querendo começar a investir em ações, é necessário entender o que, de fato, elas são, como se rentabiliza com elas e quais os riscos 
            envolvidos. Neste episódio, Enzo nos explica detalhadamente sobre todos esses pontos, para que você possa tomar suas decisões. 
          </p>
        </div>
    </div>
    <script>
    const apiKey = 'cr33hs1r01qkkc024o00cr33hs1r01qkkc024o0g'; // Substitua com sua chave de API
      
    function change() {
        console.log("mudou");
        const select = document.getElementById('stockSelect');
        const symbol = select.value; // Ticker da ação
        console.log(symbol);
        const url = `https://finnhub.io/api/v1/quote?symbol=${symbol}&token=${apiKey}`;
        
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Dados da ação:', data);

                const { c: currentPrice, h: highPrice, l: lowPrice, o: openPrice, pc: previousClose } = data;

                console.log(`Preço Atual: $${currentPrice}`);
                console.log(`Preço Máximo do Dia: $${highPrice}`);
                console.log(`Preço Mínimo do Dia: $${lowPrice}`);
                console.log(`Preço de Abertura: $${openPrice}`);
                console.log(`Preço de Fechamento Anterior: $${previousClose}`);

                var nome = document.querySelector('#nm');
                var mxdia = document.querySelector('#mxdia');
                var mndia = document.querySelector('#mndia');
                var current = document.querySelector('#preco');

                nome.innerText = symbol;
                mxdia.innerText = "R$" + highPrice.toFixed(2);
                mndia.innerText = "R$" + lowPrice.toFixed(2);
                current.innerText = "R$" + currentPrice.toFixed(2);
            })
            .catch(error => {
                console.error('Erro:', error);
            });
    }

    // Função para abrir o select automaticamente
    window.onload = function () {
        const select = document.getElementById('stockSelect');
        select.focus();
        select.click(); // Simula a abertura do menu
    };
</script>

<script>window.onload = fetchExchangeRates;</script>