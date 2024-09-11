<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Conversor de Moeda</title>
    <script>
        // Função para obter as taxas de câmbio e atualizar o select
        async function updateCurrencyRates() {
            const apiKey = '39df392d2ca8e9cb6aae02ec';
            const url = `https://api.exchangerate-api.com/v4/latest/BRL?apikey=${apiKey}`;
            
            try {
                // Fazendo a requisição à API
                const response = await fetch(url);
                const data = await response.json();
                
                // Obtendo o select
                const currencySelect = document.getElementById('currencySelect');
                
                // Atualizando o select com as taxas de câmbio para BRL
                const options = currencySelect.options;
                for (let i = 0; i < options.length; i++) {
                    const value = options[i].value;
                    if (value !== 'BRL') { // Não precisa atualizar o BRL
                        const rate = data.rates[value];
                        if (rate) {
                            // Calcula a taxa de conversão BRL para a moeda selecionada
                            const rateToBRL = (1 / rate).toFixed(2);
                            options[i].text = `${options[i].text} (1 BRL = ${rateToBRL} ${value})`;
                        }
                    }
                }
            } catch (error) {
                console.error('Erro ao obter taxas de câmbio:', error);
            }
        }
        
        // Atualiza as taxas de câmbio quando a página é carregada
        window.onload = updateCurrencyRates;
    </script>
</head>
<body>
    <select id="currencySelect" >
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
        <option value="HKD">Dólar de Hong Kong (HKD)</option>
        <option value="KRW">Won Sul-Coreano (KRW)</option>
        <option value="TRY">Lira Turca (TRY)</option>
        <option value="RUB">Rublo Russo (RUB)</option>
        <option value="ZAR">Rand Sul-Africano (ZAR)</option>
        <option value="SEK">Coroa Sueca (SEK)</option>
        <option value="NOK">Coroa Norueguesa (NOK)</option>
        <option value="AED">Dirham dos Emirados Árabes Unidos (AED)</option>
        <option value="ARS">Peso Argentino (ARS)</option>
        <option value="CLP">Peso Chileno (CLP)</option>
        <option value="COP">Peso Colombiano (COP)</option>
        <option value="HUF">Forint Húngaro (HUF)</option>
        <option value="ILS">Shekel Israelense (ILS)</option>
        <option value="MYR">Ringgit Malaio (MYR)</option>
        <option value="PHP">Peso Filipino (PHP)</option>
        <option value="PLN">Zloty Polonês (PLN)</option>
        <option value="THB">Baht Tailandês (THB)</option>
        <option value="VND">Dong Vietnamita (VND)</option>
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
    <input type="button" value="Converter" onclick="change()">
</body>
</html>
