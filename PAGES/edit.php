<?php 
include("../partials/header.php");
?>

<link rel="stylesheet" href="../STYLE/landing.css">
<link rel="stylesheet" href="../STYLE/edit.css">

<style>
  header {
    position: relative !important;
    background-color: #10002b !important;
    height: 7vw !important;
    margin: 0 !important;
    z-index: 1;
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<body>
    <div class="conteudo">
        <div class="esquerda"></div>
        <div class="direita">
            <div class="infos"></div>
            <div class="salvar">
                <button type="button" class="btn" id="deleteButton">Deletar Perfil</button>
                <button type="submit" class="btn">Salvar</button>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            console.log("Função confirmDelete chamada"); // Verifica se a função é chamada
            if (confirm('Tem certeza que deseja deletar o seu perfil? Esta ação não pode ser desfeita.')) {
                window.location.href = '../ACTS/deletar.php?codigo=<?php echo $_SESSION['codigo']; ?>';
            }
        }

        // Adiciona o evento de clique ao botão
        document.getElementById('deleteButton').addEventListener('click', confirmDelete);
    </script>
</body>
</html>
