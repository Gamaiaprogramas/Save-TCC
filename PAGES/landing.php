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
<title>Save - Landing Page</title>
        <div class="interface">
            
            <div class="txt-hero">

                <h1>Descubra uma <span>nova forma</span></h1>
                <p>Encontre a melhor maneira de cuidar do seu dinheiro <span>estamos aqui para ajudar</span> </p>
                <a href="../PAGES/login.php">
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
                    <p>Na Save Your Money, levamos a sério o compromisso com sua saúde financeira. Nossa missão é capacitar nossos clientes a gerirem melhor suas finanças, 
                        oferecendo orientações práticas e personalizadas sobre orçamento, investimentos e planejamento financeiro. Trabalhamos para transformar desafios 
                        financeiros em oportunidades, com estratégias eficazes e uma equipe de especialistas dedicados. Conte conosco para construir um futuro financeiro
                         mais sólido, seguro e eficiente.</p>
                </div>
                
                

            </article>

            <article class="itens-container">

                <div class="txt-itens">
                    <h3><span>Sobre</span> educação<br>financeira</h3>
                    <p>A Save Your Money acredita que a educação financeira é a chave para o sucesso pessoal e empresarial. Nosso objetivo é capacitar você a 
                        compreender, controlar e otimizar suas finanças de maneira eficaz. Por meio de orientação estratégica e ferramentas práticas, ajudamos 
                        nossos clientes a tomar decisões financeiras informadas, planejar o futuro e construir uma base sólida para o crescimento financeiro. 
                        Com apoio de especialistas dedicados, transformamos a complexidade das finanças em oportunidades para todos.</p>
                </div>
                
                <div class="img-itens">
                    <img src="../PICS/imgs/ilustration-3.jpg" alt="">
                </div>

            </article>

        </div>
    </section>
    <div class="profCarla">
        <a>Carla <i class="fa-solid fa-heart"></i></a>
    </div>
    <div class="profJoao">
        <a>João Viado</a>
    </div>
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
                <a href="../PAGES/selecao.php">
                    <button><i class="bi bi-cash-coin"></i> <p>Planejamento Financeiro</p> </button>
                </a>
                <a href="../ACTS/verifica_educacao.php">
                    <button><i class="bi bi-book-half"></i> <p>Educação Financeira</p> </button>
                </a>
            </article>


        </div>
    </section>

    <section class="hoteis">
        <div class="interface">

            <h3>No vermelho? <span>Deixa com a gente</span> </h3>
            <p>Os melhores planejamentos para sair desta situção.</p>
            <a href="selecao.php">
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
                        <img src="../PICS/imgs/alisonArruda.png" alt="">
                    </div> 

                    <div class="txt-instru-box">
                        <h4>Alison <span>Arruda</span></h4>
                        <p>Nascido em 16 de janeiro de 2003, é um dos desenvolvedores da Save Your Money, responsável pela parte gráfica e desenvolvimento do projeto.
                            Seu trabalho focou em dar vida ao design desenvolvido em conjunto, utilizando todo seu conhecimento adquirido durante o curso.
                        </p>
                    </div>
                
                </article>

                <article class="instru-box">

                    <div class="img-instru-box">
                        <img src="../PICS/imgs/filipe2.png" alt="">
                    </div> 

                    <div class="txt-instru-box">
                        <h4>Filipe <span>Takara</span></h4>
                        <p>Nascido em 27 de julho de 2006, é um dos desenvolvedores da Save Your Money, responsável pela documentação do projeto. Seu trabalho focou 
                            em garantir materiais claros, colaborando com a equipe para alinhar o sistema às necessidades dos usuários.</p>
                    </div>
                
                </article>

                <article class="instru-box">

                    <div class="img-instru-box">
                        <img src="../PICS/imgs/luis.jpeg" alt="">
                    </div> 

                    <div class="txt-instru-box">
                        <h4>Luis <span>Henrique</span></h4>
                        <p>
                        Nascido em 22 de abril de 2006, é um dos desenvolvedores da Save Your Money, responsável pela estilização e pela lógica do back-end. 
                        Sua contribuição foi essencial para criar uma interface atraente e garantir o funcionamento eficiente do sistema.

                    </div>
                
                </article>

                <article class="instru-box">

                    <div class="img-instru-box">
                        <img src="../PICS/imgs/alisson.jpeg" alt="">
                    </div> 

                    <div class="txt-instru-box">
                        <h4>Alisson <span>Silva</span></h4>
                        <p>Nascido em 20 de junho de 2006, é um dos desenvolvedores da Save Your Money, responsável pelo design das páginas. Com estudo em finanças, 
                            criou um layout funcional e alinhado ao tema do projeto.</p>
                    </div>
                
                </article>

                <article class="instru-box">

                    <div class="img-instru-box">
                        <img src="../PICS/imgs/GuilhermeMarques.jpeg" alt="">
                    </div> 

                    <div class="txt-instru-box">
                        <h4>Guilherme <span>Marques</span></h4>
                        <p>Nascido em 9 de outubro de 2006, é um dos desenvolvedores da Save Your Money, responsável pela arquitetura lógica do programa. 
                            Aprendeu sobre finanças para criar páginas funcionais e alinhadas às necessidades dos usuários.
                        </p>
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
                    <h3><span>Considerações</span><br>Finais</h3>
                    <p>A Save Your Money encerra este compromisso reafirmando sua dedicação a transformar vidas por meio da gestão financeira estratégica. Nosso 
                        trabalho não termina com a orientação inicial, mas continua com suporte contínuo, adaptação às necessidades dos clientes e inovação constante 
                        em soluções de economia, planejamento e investimentos. Acreditamos que, com as ferramentas certas, qualquer pessoa pode alcançar estabilidade 
                        e prosperidade financeira de maneira segura.</p>
                </div>
                
                

            </article>

        </div>
    </section>



<?php 

    include("../partials/footer.php")

?>