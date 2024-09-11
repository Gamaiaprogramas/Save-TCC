<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moeda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .card .titulo h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        .card .titulo h3 {
            font-size: 18px;
            margin: 10px 0;
            color: #666;
        }

        .card input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .card select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .card input[type="button"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .card input[type="button"]:hover {
            background-color: #0056b3;
        }

        .card .result {
            margin-top: 20px;
        }

        .card .result p {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="titulo">
            <h1>Conversor</h1>
            <h3 id="valor">BRL > USD</h3>
        </div>

        <input type="number" id="num" placeholder="R$999,99">

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
    </div>

    <script>
        function mudou() {
            // Função para manipular alterações no select
        }

        function calc() {
            // Função para calcular a conversão de moeda
        }
    </script>
</body>
</html>
