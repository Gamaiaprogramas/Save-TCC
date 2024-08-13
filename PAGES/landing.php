<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Carrossel de Teste</title>
  <link rel="stylesheet" href="/STYLE/landing.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php
    include("../PARTIALS/header.php");
  ?>


  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/PICS/carrossel1.jpg"class ="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/PICS/carrossel2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/PICS/carrossel3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</body>
</html>
