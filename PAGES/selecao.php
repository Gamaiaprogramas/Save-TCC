<?php
@session_start();

require("../ACTS/sec.php");

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Armazena o valor do nível na sessão
    $_SESSION['nivelDivida'] = $_POST['nivels'];

    // Redireciona para a próxima página
    header("Location: ../PAGES/adicaoGastos.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecione o Nível</title>
    <link rel="stylesheet" href="../STYLE/selecao.css">
</head>
<body>

<nav><a href="../PAGES/landing.php"><img src="../PICS/imgs/logo.png" alt="Logo"></a></nav>
<div class="container">
    <form action="" method="POST" class="card">
        <input type="hidden" name="nivels" value="1">
        <img src="../PICS/imgsSelecao/imgNotas.svg" alt="Imagem Notas" class="produto">
        <h2>
            - Aprender a lidar com dinheiro <br><br>
            - Pagar dívidas <br><br>
            - Sair do vermelho
        </h2>
        <button type="submit">Perfil 1</button>
    </form>

    <form action="" method="POST" class="card">
        <input type="hidden" name="nivels" value="2">
        <img src="../PICS/imgsSelecao/imgMaoEnota.svg" alt="Imagem Mão e Nota" class="produto">
        <h2>
            - Aprender a lidar com dinheiro <br>
            - Pagar dívidas <br>
            - Sair do vermelho <br>
            - Começar pequenos investimentos <br>
            - Guardar dinheiro <br>
            - Aprender mais sobre finanças 
        </h2>
        <button type="submit">Perfil 2</button>
    </form>

    <form action="" method="POST" class="card">
        <input type="hidden" name="nivels" value="3">
        <img src="../PICS/imgsSelecao/imgMao.svg" alt="Imagem Mão" class="produto">
        <h2>
            - Aprender sobre finanças <br>
            - Investir meu dinheiro <br>
            - Ter uma reserva de emergência <br>
            - Corrigir meus gastos <br>
            - Melhorar minha vida financeira
        </h2>
        <button type="submit">Perfil 3</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
<script>
    VanillaTilt.init(document.querySelectorAll(".card"), {
        max: 25,
        speed: 400,
        glare: true,
        "max-glare": 0.5
    });
</script>
</body>
</html>
