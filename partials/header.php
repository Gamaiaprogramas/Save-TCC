<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../STYLE/header.css">
    <link rel="stylesheet" href="../STYLE/responsive.css">
    <link rel="shortcut icon" href="../PICS/img2/logo.png" type="image/x-icon">
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
    </style>
    
</head>
<body>

    <header id="header">

        <div class="interface">
            <a href="../PAGES/landing.php">
                <section class="logo">
                    <img src="../PICS/imgs/logo-slogan.svg" alt="logo tipo do site">
            </section>
            </a>
            

            <section class="menu-desktop">
                <nav>
                    <ul>
                        <li><a href="#">Início</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="#">Sobre</a></li>
                        
                    </ul>
                </nav> 
            </section>  
             
            <section class="btn-contato">
    <?php 
        @session_start();  
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
            echo "
            <div class='user-menu'>
                <img src='".$_SESSION['foto']."' class='user-photo'>
                <div class='dropdown-content'>
                    <a href='../PAGES/perfil.php'>Perfil</a>
                    <a href='../PAGES/configuracoes.php'>Configurações</a>
                    <a href='../ACTS/logoff.act.php'>Sair</a>
                </div>
            </div>";  
        }
        else{
            echo "<a href='../PAGES/login.php'>
                    <button>Entrar</button>
                  </a>";
        }
    ?>
</section>

            
                
            </section>

            <div class="btn-menu-mob" id="btn-menu-mob">
                <div class="line-menu-mob-1"></div>
                <div class="line-menu-mob-2"></div>
            </div>
            
            <section class="menu-mobile" id="menu-mobile">
                <nav>
                    <ul>
                        <li><a href="#">Início</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="#">Sobre</a></li>
                        
                    </ul>
                </nav> 
            </section>

        </div>

    </header>