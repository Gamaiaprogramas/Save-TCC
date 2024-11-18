<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../STYLE/headeralternative.css">
    <link rel="stylesheet" href="../STYLE/responsive.css">
    <link rel="shortcut icon" href="../PICS/imgs/save_logo_site.png" type="image/x-icon">
    <!-- Scripts de JS -->

    <script src="../JS/js/btn-menu-mob.js" defer></script>
    <!-- end Scripts de Js -->
   
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- end Google Fonts -->
    
    <!-- Bootstrao icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--  end Bootstrao icons -->

    <title>Home - Save</title>

    <style>
        body::-webkit-scrollbar {
            width: 7px;
        }
        body::-webkit-scrollbar-thumb {
            border-radius: 80px;
            background: #ff6d00
        }
        body::-webkit-scrollbar-track {
            background: #10002b;
            
        }
        .green{
            background-color: green;
            width: 100%;
            height: 2vw;
            color: #fff;
            display: flex;
            justify-content: center;
            position: absolute;
            top: 0;
            align-items: center;
            margin-top: -.2vw !important;
        }

        .red{
            background-color: #c50000;
            width: 100%;
            height: 2vw;
            color: #fff;
            display: flex;
            justify-content: center;
            position: absolute;
            top: 0;
            align-items: center;
            margin-top: -.2vw !important;
        }

        .hidden{
            display: none;
        }
    </style>
    
</head>
<body>

<header>
    <div class="user">
        <?php
            if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
                echo "
                    <a href='../PAGES/perfil.php'>
                    <img src='".$_SESSION['foto']."' class='user-photo'>
                    </a>
                    <div class='nome'><p>Olá, $_SESSION[nome]!</p></div>
                ";  
            }

        ?>

        
    </div>
    
    <div class="menu">
        <ul>
            <a href="../PAGES/landing.php">
                <li class="mn1">Início</li>
            </a>
            <a href="../PAGES/perfil.php">
                <li class="mn2">Perfil</li>

            </a>
            <a href="../PAGES/cambio.php">
                <li class="mn4">Cotação <span>Dolar</span></li>
            </a>
            <a href="../PAGES/action.php">
                <li class="mn5"><span>Bolsa de valores</span></li>
            </a>
            
            <a href="../ACTS/logoff.act.php">
                <li class="exit"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i></li>

            </a>
        </ul>
    </div>

</header>