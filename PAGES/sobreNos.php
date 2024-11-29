<?php
    @session_start();
    include('../partials/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../STYLE/sobreNos.css">
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <link rel="stylesheet" href="../STYLE/responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save - Sobre nós</title>
</head>
<body>
    <div class="topoSave">
        <div class="topoEsquerda">
            <div class="nomeEsquerdaTopo">
                <a>Save Your</a>
                <a>Money</a>
            </div>
            <div class="textoEsquerdaTopo">
                <a>Experiência. Compromisso. Valor.</a>
            </div>
        </div>
    </div>
    <div class="espacoAntesTudo">
        <div class="tituloAntes">
            <a>Antes de tudo</a>
        </div>
        <div class="textoAntes">
            <a>Em 2024, o endividamento das famílias brasileiras continua elevado, principalmente devido ao uso excessivo de crédito e à falta de educação financeira.
                Muitas pessoas não sabem gerenciar suas finanças, o que resulta em dívidas com juros altos, especialmente no crédito rotativo. 
                Esse ciclo de endividamento dificulta a recuperação financeira e agrava a situação econômica das famílias.
            </a>
        </div>
    </div>
    <div class="espacoGrafico">
        <div class = "textoGrafico"><div></div><h1>Percentual de famílias endividadas (de acordo com a CNC): </h1></div>
    <div id="chartdiv" style = "height : 100%; width : 70%;"></div>
    </div>
    <div class="espacoOQ">
        <div class="tituloOQ">
            <a>O que isso significa</a>
        </div>
        <div class="espacoCardOQ">
            <div class="cardOQ">
                <div class="fotoCardOQ">
                    <img src="../PICS/imgsSobreNos/card1.png" alt="">
                </div>
                <div class="textoCardOQ">
                    <a>O alto endividamento gera um ciclo vicioso, onde as famílias se endividam cada vez mais para cobrir dívidas anteriores, o que dificulta a recuperação financeira.</a>
                </div>
            </div>
            <div class="cardOQ">
                <div class="fotoCardOQ">
                    <img src="../PICS/imgsSobreNos/card2.png" alt="">
                </div>
                <div class="textoCardOQ">
                    <a>O endividamento excessivo causa estresse e afeta a qualidade de vida, tornando difícil planejar o futuro e atingir objetivos financeiros.</a>
                </div>
            </div>
            <div class="cardOQ">
                <div class="fotoCardOQ">
                    <img src="../PICS/imgsSobreNos/card3.png" alt="">
                </div>
                <div class="textoCardOQ">
                    <a>Famílias endividadas enfrentam dificuldades para obter novos créditos, prejudicando a compra de bens essenciais e limitando o crescimento econômico pessoal.</a>
                </div>
            </div>
        </div>
    </div>
    <div class="espacoEstamos">
        <div class="tituloEstamos">
            <a>Estamos aqui...</a>
        </div>
        <div class="infosEstamos">
            <a class="t">Com base nessa triste realidade vivida por milhões de Brasileiros,nós surgimos, a “Save Your Money”,venho com a proposta de melhorar a vida
                financeira de milhares de pessoas,com profissionais e tecnologia de ponta,para ajudar você e seu dinheiro.</a>
            <div class="btnEstamos">
                <a href="../PAGES/selecao.php">Preciso de ajuda <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        </div>
        
    </div>
    <div class="espacoCrono">
        <div class="tituloCrono">
            <a>Nosso cronograma</a>
        </div>
        <div class="infosCrono">
            <div class="cimaCrono">
                <div class="divCimaCrono">
                    <a>-Cadastrar suas dividas</a>
                    <a>-Cadastrar seus gastos Fixos</a>
                    <a class="laranja">Fase 2</a>
                </div>
                <div class="divCimaCrono">
                    <a>-Realizar as ações propostas</a>
                    <a>pela nossa equipe, com base em suas informações, para melhorar sua vida financeira</a>
                    <a class="laranja2">Fase 4</a>
                </div>
            </div>
            <div class="divisaoCrono">
                <a class="bola"></a>
                <a class="traco"></a>
                <a class="bola"></a>
                <a class="traco"></a>
                <a class="bola"></a>
                <a class="traco"></a>
                <a class="bola"></a>
                <a class="traco"></a>
                <a class="bola"></a>
            </div>
            <div class="baixoCrono">
                <div class="divBaixoCrono1">
                    <a class="laranja">Fase 1</a>
                    <a>-Realizar cadastro</a>
                    <a>-coletar suas informações</a>
                    <a>-Escolher seu tipo de perfil</a>
                </div>
                <div class="divBaixoCrono2">
                    <a class="laranja">Fase 3</a>
                    <a>-Visualizar sua DashBoard</a>
                    <a>-Ter acesso as funcionalidades da aplicação</a>
                </div>
                <div class="divBaixoCrono3">
                <a class= "laranja">Fase 5</a>
                <a>-Ver os resultados alcançados, e propor avanços se o usuário achar necessário.</a>
                </div>
            </div>
        </div>
    </div>
    <div class="espacoPerfil">
        <div class="conteudoPerfil">
            <div class="fotoPerfil">
                <img src="../PICS/imgsSobreNos/img_quebraCab" alt="">
            </div>
            <div class="espacoTextoPerfil">
                <div class="tituloPerfil">
                    <a>Perfil da</a>
                    <a class="sepPerfil">Empresa</a>
                </div>
                <div class="textoPerfil">
                    <a>Nós da Save ,acima de tudo queremos ajudar nossos clientes, lidar com dinheiro não é tarefa fácil, focamos em experiência, valorizar o trabalho, 
                        e temos um compromisso com quem procura nossos serviços, 
                        nosso  meta é ser uma das maiores consultora financeira do pais, sendo ligada principalmente com o público de baixa renda.</a>
                </div>
                <div class="espacoBtnPerfil">
                    <div class="btnPerfil">
                        <a href="../PAGES/perfil.php">Faça Parte <i class="fa-solid fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="espacoServicos">
        <div class="esquerdaServicos">
            <div class="tituloServicos">
                <a>Nossos</a>
                <a>Serviços</a>
            </div>
            <div class="fotoServicos">
                <img src="../PICS/imgsSobreNos/img_Servicos" alt="">
            </div>
        </div>
        <div class="direitaServicos">
            <div class="daleServicos">
                <div class="esquerdaDale">
                    <a>01</a>
                </div>
                <div class="direitaDale">
                    <div class="cimaDale">
                        <a>Cambio Atual</a>
                    </div>
                    <div class="baixoDale">
                        <a>Temos aplicação mostrando o cambio de moedas do mundo inteiro.</a>
                    </div>
                </div>
            </div>
            <div class="daleServicos">
                <div class="esquerdaDale">
                    <a>02</a>
                </div>
                <div class="direitaDale">
                    <div class="cimaDale">
                        <a>Bolsa de Valores</a>
                    </div>
                    <div class="baixoDale">
                        <a>Criamos um programa para monitora mais de 25 ações na bolsa.</a>
                    </div>
                </div>
            </div>
            <div class="daleServicos">
                <div class="esquerdaDale">
                    <a class="txt3">03</a>
                </div>
                <div class="direitaDale">
                    <div class="cimaDale">
                        <a>DashBoard</a>
                    </div>
                    <div class="baixoDale">
                        <a>Após coletar todas as informações financeira do usuario criamos uma DashBoard pessoa,mostrandos todos estes dados.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="espacoClientes">
        <div class="cimaClientes">
            <div class="tituloCliente">
                <a>Nossos Clientes</a>
            </div>
            <div class="textoCliente">
                <a>Desde o começo, prestamos serviços de confiança a nossos clientes. Tivemos a honra de</a>
                <a>sermos a primeira empresa na escolha das seguintes corporações:</a>
            </div>
        </div>
        <div class="baixoClientes">
            <div class="cliente">
                <div class="fotoCliente1">
                    <img src="../PICS/imgsSobreNos/tccArena.png" alt="">
                </div>
                <div class="nomeCliente">
                    <a>Arena Sport</a>
                </div>
            </div>
            <div class="cliente">
                <div class="fotoCliente">
                <img src="../PICS/imgsSobreNos/tccLais" alt="">
                </div>
                <div class="nomeCliente">
                    <a>Crowvo Studio</a>
                </div>
            </div>
            <div class="cliente">
                <div class="fotoCliente">
                <img src="../PICS/imgsSobreNos/tccKauan" alt="">
                </div>
                <div class="nomeCliente">
                    <a>HeartScale♥ Inc</a>
                </div>
            </div>
        </div>
    </div>
    <div class="espacoDesenvolvimento">
        <div class="cimaDev">
            <div class="tituloDev">
                <a>Desenvolvimento</a>
                <a class="laranja">Financeiro</a>
            </div>
        </div>
        <div class="baixoDev">
            <div class="textoDev">
                <a>Em nossa equipe temos os melhores profissionais do mercado, Desenvolvedores, Economistas e colaboradores compõe nosso time, 
                    estamos ligados a vários projetos direcionados a desenvolver a educação financeira no Brasil. Na Save pensamos em você e no país.</a>
            </div>
        </div>
    </div>
    <div class="espacoFrase">
        <div class="meioFrase">
            <div class="propriaFrase">
                <a>"Muitos sabem ganhar dinheiro, mas poucos</a>
                <a>sabem gastá-lo."</a>
            </div>
            <div class="autorFrase">
                <a>— Henry David Thoreau</a>
            </div>
        </div>
    </div>
    <div class="espacoTrabalhar">
        <div class="esquerdaTrabalho">
            <div class="tituloTrabalho">
                <a>Vamos trabalhar juntos.</a>
            </div>
            <div class="fotoTrabalho">
                <img src="../PICS/imgsSobreNos/img_MaoEstendi" alt="">
            </div>
        </div>
        <div class="direitaTrabalho">
            <div class="divTrabalho">
                <a class="laranjaTrabalho">Endereço</a>
                <a>R. Virgínia Ferni, 400 - Itaquera, São Paulo - SP</a>
            </div>
            <div class="divTrabalho">
                <a class="laranjaTrabalho">Telefone</a>
                <a>(11) 3456-7890</a>
            </div>
            <div class="divTrabalho">
                <a class="laranjaTrabalho">E-mail</a>
                <a>saveyourmoney@gmail.com</a>
            </div>
        </div>
    </div>
</body>
<script>
    am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
    am5themes_Animated.new(root)
    ]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {

    
    
    paddingLeft:0,
    paddingRight:1
    }));

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineY.set("visible", false);


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xRenderer = am5xy.AxisRendererX.new(root, { 
    minGridDistance: 30, 
    minorGridEnabled: true
    });

    xRenderer.labels.template.setAll({
    rotation: 0, // Define a rotação como 0 para deixar os rótulos na horizontal
    centerY: am5.p50,
    centerX: am5.p100,
    paddingRight: 15
    });


    xRenderer.grid.template.setAll({
    location: 1
    })

    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    maxDeviation: 0.3,
    categoryField: "country",
    renderer: xRenderer,
    tooltip: am5.Tooltip.new(root, {})
    }));

    var yRenderer = am5xy.AxisRendererY.new(root, {
    strokeOpacity: 0.1
    })

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    maxDeviation: 0.3,
    renderer: yRenderer,
    min: 0,  // Valor mínimo do eixo Y
    max: 100   //
    }));

    // Create series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
    name: "Series 1",
    xAxis: xAxis,
    yAxis: yAxis,
    valueYField: "value",
    sequencedInterpolation: true,
    categoryXField: "country",
    tooltip: am5.Tooltip.new(root, {
        labelText: "{valueY}"
    })
    }));

    series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
    series.columns.template.adapters.add("fill", function (fill, target) {
    return "#ff6d00";  // Define a cor das colunas para #ff6d00
    });

    series.columns.template.adapters.add("stroke", function (stroke, target) {
    return "#ff6d00";  // Define a cor do contorno das colunas para #ff6d00
    });



    // Set data
    var data = [{
    country: "2019",
    value: 60
    }, {
    country: "2020",
    value: 67
    }, {
    country: "2021",
    value: 71
    }, {
    country: "2022",
    value: 78
    }, {
    country: "2023",
    value: 81
    }, {
    country: "2024",
    value: 80
    }];

    xAxis.data.setAll(data);
    series.data.setAll(data);


    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);

    }); // end am5.ready()
</script>
<script src="../JS/js/menu.js"></script>
<?php
    include("../partials/footer.php");
?>
</html>
