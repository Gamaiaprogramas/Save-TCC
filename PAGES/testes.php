<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de E-mail com Hunter.io</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        /* styles.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    text-align: center;
}

input[type="email"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
}

button {
    padding: 10px 20px;
    border: none;
    background-color: #28a745;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}

#result {
    margin-top: 20px;
    text-align: left;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Validador de E-mail</h1>
        <form id="emailForm">
            <input type="email" id="emailInput" placeholder="Digite o e-mail" required>
            <button type="submit">Verificar</button>
        </form>
        <div id="result">
            <p id="resultStatus"></p>
            <p id="resultScore"></p>
            <p id="resultSMTP"></p>
            <p id="resultDisposable"></p>
        </div>
    </div>
    <script>
        // script.js
document.getElementById('emailForm').addEventListener('submit', async (event) => {
    event.preventDefault();
    
    const email = document.getElementById('emailInput').value;
    const resultStatus = document.getElementById('resultStatus');
    const resultScore = document.getElementById('resultScore');
    const resultSMTP = document.getElementById('resultSMTP');
    const resultDisposable = document.getElementById('resultDisposable');
    
    resultStatus.textContent = 'Verificando...';
    resultScore.textContent = '';
    resultSMTP.textContent = '';
    resultDisposable.textContent = '';
    
    try {
        const response = await fetch(`https://api.hunter.io/v2/email-verifier?email=${email}&api_key=bce34898dec52c6c6151a0349c243b79219e296e`);
        
        if (!response.ok) {
            throw new Error('Erro na resposta da API');
        }
        
        const data = await response.json();
        
        if (data.data) {
            resultStatus.textContent = `Status: ${data.data.result}`;
            resultScore.textContent = `Score: ${data.data.score}`;
            resultSMTP.textContent = `SMTP Provider: ${data.data.smtp_provider}`;
            resultDisposable.textContent = `Disposable: ${data.data.disposable ? 'Sim' : 'Não'}`;
        } else {
            resultStatus.textContent = 'E-mail inválido ou erro ao verificar.';
        }
    } catch (error) {
        resultStatus.textContent = 'Erro ao verificar o e-mail.';
        console.error('Erro:', error);
    }
});

    </script>
</body>
</html>
