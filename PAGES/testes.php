<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="text" id="cpf" placeholder="CPF" />

<script>
  document.getElementById('cpf').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
    if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos
    e.target.value = value.replace(/(\d{3})(\d)/, '$1.$2') // Adiciona o primeiro ponto
                          .replace(/(\d{3})(\d)/, '$1.$2') // Adiciona o segundo ponto
                          .replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona o hífen
  });
</script>

</body>
</html>