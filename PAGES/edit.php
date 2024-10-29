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
  .show{
    display: block;
  }
  .hidden{
    display: none;
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
    <div class="confirmar hidden" id="confirm">
        <div class="cima"><p>Tem certeza?</p></div>
        <div class="baixo">
            <a href="../ACTS/deletar.php"><button type="button">Sim</button></a>
            <button type="button" onclick="cancel()">Não</button> 
        </div>
    </div>


    <div class="conteudo">
        <div class="esquerda"></div>
        <div class="direita">
            <div class="infos"></div>
            <div class="salvar">
                <button type="button" class="btn" id="deleteButton" onclick="confirmDelete()">Deletar Perfil</button>

                <button type="submit" class="btn">Salvar</button>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            console.log("oia")
            container = document.querySelector('#confirm')
            container.classList.add('show')
            container.classList.remove('hidden')
        }
        function cancel() {
            console.log("oia")
            container = document.querySelector('#confirm')
            container.classList.add('hidden')
            container.classList.remove('show')
        }

    </script>
</body>
</html>
