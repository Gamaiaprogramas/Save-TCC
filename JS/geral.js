   
   
   function LandingAct(){
    // landing 
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
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(
      am5percent.PieChart.new(root, {
        endAngle: 270
      })
    );
    
    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(
      am5percent.PieSeries.new(root, {
        valueField: "value",
        categoryField: "category",
        endAngle: 270
      })
    );
    
    series.states.create("hidden", {
      endAngle: -90
    });
    
    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series.data.setAll([{
      category: "Sim",
      value: 21
    },
    
    {
      category: "Não",
      value: 15
    }]);
    
    series.appear(1000, 100);
    
    }); // end am5.ready()

    AOS.init();
  }



    // Cambio

    
    function fetchExchangeRates() {
      fetch('../ACTS/cambio.act.php')
        .then(response => response.json())
        .then(data => {
          console.log('Dados recebidos:', data); // Adicione esta linha para depuração
          if (data.error) {
            document.getElementById('usd').textContent = 'Erro ao obter USD';
            document.getElementById('eur').textContent = 'Erro ao obter EUR';
            document.getElementById('gbp').textContent = 'Erro ao obter GBP';
            document.getElementById('jpy').textContent = 'Erro ao obter JPY';
          } else {
            // Calcula quantos reais são necessários para comprar uma unidade da moeda
            let usdToBRL = (1 / data.USD).toFixed(2);
            let eurToBRL = (1 / data.EUR).toFixed(2);
            let gbpToBRL = (1 / data.GBP).toFixed(2);
            let jpyToBRL = (1 / data.JPY).toFixed(2);
    
            document.getElementById('usd').textContent = `Para comprar 1 USD você precisa de ${usdToBRL} BRL`;
            document.getElementById('eur').textContent = `Para comprar 1 EUR você precisa de ${eurToBRL} BRL`;
            document.getElementById('gbp').textContent = `Para comprar 1 GBP você precisa de ${gbpToBRL} BRL`;
            document.getElementById('jpy').textContent = `Para comprar 1 JPY você precisa de ${jpyToBRL} BRL`;
          }
        })
        .catch(error => {
          console.error('Erro ao obter os dados:', error);
        });
    }
    