<?php 

    @session_start();
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }


    include("../partials/header.php");

?>
<script src="../JS/js/menu.js" defer></script>
<link rel="stylesheet" href="../STYLE/responsive.css">

<link rel="stylesheet" href="../STYLE/landing.css">
<section class="hero-site">
        
        <div class="interface">
            
            <div class="txt-hero">

                <h1>Descubra uma <span>nova forma</span></h1>
                <p>Encontre a melhor maneira de cuidar do seu dinheiro <span>estamos aqui para ajudar</span> </p>
                <a href="#">
                    <button>Quero conhecer</button>
                </a>

            </div>
        
        </div>
    
    </section>

    <section class="vantagens">
        <div class="interface">

            <article class="itens-container">

                <div class="txt-itens">
                    <h3><span>Sobre</span> a<br>empresa</h3>
                    <p>Save Your Money é uma empresa especializada em gestão financeira, dedicada a ajudar seus clientes a otimizar e proteger
                    suas finanças pessoais e empresariais. Nosso objetivo é proporcionar uma abordagem estratégica e personalizada para o gerenciamento de dinheiro, 
                    oferecendo orientação sobre orçamento, investimentos, e planejamento financeiro. Com uma equipe de especialistas comprometidos em transformar desafios 
                    financeiros em oportunidades, a Save Your Money é a parceira ideal para aqueles que buscam um futuro financeiro mais seguro e eficiente.</p>
                </div>
                
                <div class="img-itens">
                    <img src="../PICS/imgs/ilustration-1.jpg" alt="">

                </div>

            </article>

            <article class="itens-container">

                <div class="img-itens item-1">
                    <img src="../PICS/imgs/ilustration-2.jpg" alt="">

                </div>
                
                
                <div class="txt-itens item-2">
                    <h3><span>Como lidamos</span> com<br>seu dinheiro</h3>
                    <p>Save Your Money é uma empresa especializada em gestão financeira, dedicada a ajudar seus clientes a otimizar e proteger
                    suas finanças pessoais e empresariais. Nosso objetivo é proporcionar uma abordagem estratégica e personalizada para o gerenciamento de dinheiro, 
                    oferecendo orientação sobre orçamento, investimentos, e planejamento financeiro. Com uma equipe de especialistas comprometidos em transformar desafios 
                    financeiros em oportunidades, a Save Your Money é a parceira ideal para aqueles que buscam um futuro financeiro mais seguro e eficiente.</p>
                </div>
                
                

            </article>

            <article class="itens-container">

                <div class="txt-itens">
                    <h3><span>Sobre</span> educação<br>financeira</h3>
                    <p>Save Your Money é uma empresa especializada em gestão financeira, dedicada a ajudar seus clientes a otimizar e proteger
                    suas finanças pessoais e empresariais. Nosso objetivo é proporcionar uma abordagem estratégica e personalizada para o gerenciamento de dinheiro, 
                    oferecendo orientação sobre orçamento, investimentos, e planejamento financeiro. Com uma equipe de especialistas comprometidos em transformar desafios 
                    financeiros em oportunidades, a Save Your Money é a parceira ideal para aqueles que buscam um futuro financeiro mais seguro e eficiente.</p>
                </div>
                
                <div class="img-itens">
                    <img src="../PICS/imgs/ilustration-3.jpg" alt="">
                </div>

            </article>

        </div>
    </section>

    <section class="contato">
        <div class="interface">

            <article class="txt-contato">
                <h3>Alguns dos <span>nossos serviços</span></h3>
                <p>solicte sua consultoria agora mesmo.</p>
            </article>

            <article class="icons-contato">
                <a href="../PAGES/cambio.php">
                    <button><i class="bi bi-currency-exchange"></i> <p>Câmbio de Moedas</p> </button>
                </a>
                <a href="../PAGES/action.php">
                    <button><i class="bi bi-headset"></i> <p>Ações e Rentabilidade</p> </button>
                </a>
                <a href="../PAGES/login.php">
                    <button><i class="bi bi-cash-coin"></i> <p>Planejamento Financeiro</p> </button>
                </a>
                <a href="#">
                    <button><i class="bi bi-book-half"></i> <p>Educação Financeira</p> </button>
                </a>
            </article>


        </div>
    </section>

    <section class="hoteis">
        <div class="interface">

            <h3>No vermelho? <span>Deixa com a gente</span> </h3>
            <p>Os melhores planejamentos para sair desta situção.</p>
            <a href="#">
                <button>Conheça o plano</button>
            </a>

        </div>
    </section>

    <section class="como-funciona">
        <div class="interface">

            <div class="txt-funciona">
                <h3>Nossos<span>Developers!</span></h3>
            </div>

            <div class="instrucoes">

                <article class="instru-box">

                    <div class="img-instru-box">
                        <img src="../PICS/imgs/user.png" alt="">
                    </div> 

                    <div class="txt-instru-box">
                        <h4>Alison <span>Arruda</span></h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam maxime nulla dolorum eius necessitatibus quas accusamus ab aliquid iusto illum dolores porro ipsum suscipit atque unde saepe possimus, culpa facilis.</p>
                    </div>
                
                </article>

                <article class="instru-box">

                    <div class="img-instru-box">
                        <img src="../PICS/imgs/user.png" alt="">
                    </div> 

                    <div class="txt-instru-box">
                        <h4>Filipe <span>Takara</span></h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam maxime nulla dolorum eius necessitatibus quas accusamus ab aliquid iusto illum dolores porro ipsum suscipit atque unde saepe possimus, culpa facilis.</p>
                    </div>
                
                </article>

                <article class="instru-box">

                    <div class="img-instru-box">
                        <img src="../PICS/imgs/user.png" alt="">
                    </div> 

                    <div class="txt-instru-box">
                        <h4>Luis <span>Henrique</span></h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam maxime nulla dolorum eius necessitatibus quas accusamus ab aliquid iusto illum dolores porro ipsum suscipit atque unde saepe possimus, culpa facilis.</p>
                    </div>
                
                </article>

                <article class="instru-box">

                    <div class="img-instru-box">
                        <img src="../PICS/imgs/user.png" alt="">
                    </div> 

                    <div class="txt-instru-box">
                        <h4>Alisson <span>Silva</span></h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam maxime nulla dolorum eius necessitatibus quas accusamus ab aliquid iusto illum dolores porro ipsum suscipit atque unde saepe possimus, culpa facilis.</p>
                    </div>
                
                </article>

                <article class="instru-box">

                    <div class="img-instru-box">
                        <img src="../PICS/imgs/user.png" alt="">
                    </div> 

                    <div class="txt-instru-box">
                        <h4>Guilherme <span>Marques</span></h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam maxime nulla dolorum eius necessitatibus quas accusamus ab aliquid iusto illum dolores porro ipsum suscipit atque unde saepe possimus, culpa facilis.</p>
                    </div>
                
                </article>

            </div>

        </div>
    </section>

    <section class="vantagens">
        <div class="interface">

            <article class="itens-container">

                <div class="img-itens item-1">
                    <img src="../PICS/imgs/ilustration-4.jpg" alt="">

                </div>

                <div class="txt-itens item-2">
                    <h3><span>Considereções</span><br>Finais</h3>
                    <p>Save Your Money é uma empresa especializada em gestão financeira, dedicada a ajudar seus clientes a otimizar e proteger
                    suas finanças pessoais e empresariais. Nosso objetivo é proporcionar uma abordagem estratégica e personalizada para o gerenciamento de dinheiro, 
                    oferecendo orientação sobre orçamento, investimentos, e planejamento financeiro. Com uma equipe de especialistas comprometidos em transformar desafios 
                    financeiros em oportunidades, a Save Your Money é a parceira ideal para aqueles que buscam um futuro financeiro mais seguro e eficiente.</p>
                </div>
                
                

            </article>

        </div>
    </section>
<?php 

    include("../partials/footer.php")

?>