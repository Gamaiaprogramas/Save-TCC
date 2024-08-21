<?php
// Sua chave de API
$apiKey = '39df392d2ca8e9cb6aae02ec';

// URL da API
$url = "https://v6.exchangerate-api.com/v6/$apiKey/latest/BRL";

// Inicia a sessão cURL
$ch = curl_init();

// Configura as opções do cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Adicione esta linha

// Executa a requisição e captura a resposta
$response = curl_exec($ch);

// Verifica se houve erro na requisição cURL
if(curl_errno($ch)) {
    echo json_encode(['error' => 'Erro na requisição: ' . curl_error($ch)]);
    curl_close($ch);
    exit;
}

// Fecha a sessão cURL
curl_close($ch);

// Decodifica a resposta JSON
$data = json_decode($response, true);

// Verifica se a resposta da API foi bem-sucedida
if ($data && $data['result'] == 'success') {
    // Retorna o JSON com as taxas de câmbio
    echo json_encode($data['conversion_rates']);
} else {
    // Retorna uma mensagem de erro
    echo json_encode(['error' => 'Erro ao obter dados de câmbio']);
}



//////////////////////////////////


$alphakey = 'AHTP1IB6NNE6M8KC';


// replace the "demo" apikey below with your own key from https://www.alphavantage.co/support/#api-key
$json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=IBM&interval=5min&apikey=AHTP1IB6NNE6M8KC');

$data2 = json_decode($json,true);

session_start();

$_SESSION['data'] = $data2;


exit;
?>
