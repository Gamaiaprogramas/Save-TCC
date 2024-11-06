<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descriptografar MD5 com JavaScript</title>
</head>
<body>

    <h2>Descubra o valor original de um hash MD5</h2>
    <input type="text" id="md5-input" placeholder="Digite o hash MD5">
    <button onclick="reverseMD5()">Descobrir Valor</button>

    <p id="result"></p>

    <script>
        function reverseMD5() {
            const hash = document.getElementById('md5-input').value;

            if (!hash) {
                alert('Por favor, digite um hash MD5.');
                return;
            }

            const apiKey = 'SUA_CHAVE_DE_API'; // Substitua por sua chave de API
            const apiUrl = `https://api.md5decrypt.net/resolve/${hash}?apikey=${apiKey}`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.result) {
                        document.getElementById('result').textContent = `Valor original: ${data.result}`;
                    } else {
                        document.getElementById('result').textContent = 'Valor não encontrado na base de dados.';
                    }
                })
                .catch(error => {
                    document.getElementById('result').textContent = 'Erro ao consultar a API.';
                    console.error(error);
                });
        }
    </script>

</body>
</html>
