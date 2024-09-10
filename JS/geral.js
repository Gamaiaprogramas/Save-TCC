   
   
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
      let Geral =[] ;
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
               // Calcula quantos reais são necessários para comprar uma unidade da moeda
        var usdToBRL = (1 / data.USD).toFixed(2);
        var eurToBRL = (1 / data.EUR).toFixed(2);
        var jpyToBRL = (1 / data.JPY).toFixed(2);
        var gbpToBRL = (1 / data.GBP).toFixed(2);
        var audToBRL = (1 / data.AUD).toFixed(2);
        var cadToBRL = (1 / data.CAD).toFixed(2);
        var chfToBRL = (1 / data.CHF).toFixed(2);
        var cnyToBRL = (1 / data.CNY).toFixed(2);
        var sekToBRL = (1 / data.SEK).toFixed(2);
        var nzdToBRL = (1 / data.NZD).toFixed(2);
        var mxnToBRL = (1 / data.MXN).toFixed(2);
        var sgdToBRL = (1 / data.SGD).toFixed(2);

        // Adiciona os valores convertidos ao array "Geral"
        Geral.push(usdToBRL, eurToBRL, jpyToBRL, gbpToBRL, audToBRL, cadToBRL, chfToBRL, cnyToBRL, sekToBRL, nzdToBRL, mxnToBRL, sgdToBRL);

           // Grafico
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
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            paddingLeft: 0,
            layout: root.verticalLayout
          }));
          console.log(Geral[0] + " o");
          // Data
          var colors = chart.get("colors");
          var data = [{
            country: "Dólar Americano",
            visits:parseFloat(Geral[0]) ,
            icon: "https://static.vecteezy.com/system/resources/previews/013/743/592/original/united-states-flag-round-icon-american-flag-png.png",
            columnSettings: { fill: colors.next() }
          },{
            country: "Euro",
              visits: parseFloat(Geral[1]),
              icon: "../JS/img/bandeiras/united-kingdom.svg",
              columnSettings: { fill: colors.next() }
            },{
              country: "Iene",
                visits: parseFloat(Geral[2]),
                icon: "../JS/img/bandeiras/japan.svg",
                columnSettings: { fill: colors.next() }
              }, {
            country: "Libra Esterlina",
            visits: parseFloat(Geral[3]),
            icon: "../JS/img/bandeiras/european-union.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Dólar Australiano",
            visits: parseFloat(Geral[4]),
            icon: "https://www.amcharts.com/wp-content/uploads/flags/china.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Dólar Canadense",
            visits:parseFloat(Geral[5]) ,
            icon: "https://www.amcharts.com/wp-content/uploads/flags/japan.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Franco Suíço",
            visits: parseFloat(Geral[6]),
            icon: "https://www.amcharts.com/wp-content/uploads/flags/germany.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Yuan Chinês",
            visits: parseFloat(Geral[7]),
            icon: "../JS/img/bandeiras/china.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Coroa Sueca",
            visits: parseFloat(Geral[8]),
            icon: "../JS/img/bandeiras/",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Dólar Neozelandês",
            visits: parseFloat(Geral[9]),
           
            icon: "https://www.amcharts.com/wp-content/uploads/flags/spain.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Peso Mexicano",
            visits: parseFloat(Geral[10]),
            icon: "../JS/img/bandeiras/mexico.svg",
            columnSettings: { fill: colors.next() }
          },{
            country: "Dólar de Singapura",
            visits: parseFloat(Geral[11]),
            
            icon: "https://www.amcharts.com/wp-content/uploads/flags/canada.svg",
            columnSettings: { fill: colors.next() }
          }];
          /*USD - Estados Unidos (Dólar Americano)
EUR - União Europeia (Euro)
JPY - Japão (Iene)
GBP - Reino Unido (Libra Esterlina)
AUD - Austrália (Dólar Australiano)
CAD - Canadá (Dólar Canadense)
CHF - Suíça (Franco Suíço)
CNY - China (Yuan Chinês)
SEK - Suécia (Coroa Sueca)
NZD - Nova Zelândia (Dólar Neozelandês)
MXN - México (Peso Mexicano)
SGD - Singapura (Dólar de Singapura)
 implemente essas no codigo*/
          
          
          // Create axes
          // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
          var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 30,
            minorGridEnabled: true
          })
          
          var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "country",
            renderer: xRenderer,
            bullet: function (root, axis, dataItem) {
              return am5xy.AxisBullet.new(root, {
                location: 0.5,
                sprite: am5.Picture.new(root, {
                  width: 24,
                  height: 24,
                  centerY: am5.p50,
                  centerX: am5.p50,
                  src: dataItem.dataContext.icon
                })
              });
            }
          }));
          
          xRenderer.grid.template.setAll({
            location: 1
          })
          
          xRenderer.labels.template.setAll({
            paddingTop: 20,
            fontSize: 13 , 
            // Ajuste o tamanho da fonte
            fill: am5.color(0x000000)
          });
          
          xAxis.data.setAll(data);
          
          var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {
              strokeOpacity: 0.1
            })
          }));
          
          
          // Add series
          // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
          var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "visits",
            categoryXField: "country"
          }));
          
          series.columns.template.setAll({
            tooltipText: "{categoryX}: {valueY}",
            tooltipY: 0,
            fill: am5.color("#10002b"), // Ajuste a cor das colunas (vermelho neste exemplo)
            strokeOpacity: 0,
       
          });
          series.columns.template.adapters.add("fill", function (fill, target) {
            // Verifique o país e defina a cor
            if (target.dataItem && target.dataItem.dataContext.country === "Euro") {
              return am5.color("#ff6d00"); // Cor específica para "Euro"
            }
            return fill; // Cor padrão para outros
          });
          series.columns.template.adapters.add("fill", function (fill, target) {
            // Verifique o país e defina a cor
            if (target.dataItem && target.dataItem.dataContext.country === "Libra Esterlina") {
              return am5.color("#ff6d00"); // Cor específica para "Euro"
            }
            return fill; // Cor padrão para outros
          });
          series.columns.template.adapters.add("fill", function (fill, target) {
            // Verifique o país e defina a cor
            if (target.dataItem && target.dataItem.dataContext.country === "Dólar Canadense") {
              return am5.color("#ff6d00"); // Cor específica para "Euro"
            }
            return fill; // Cor padrão para outros
          });
          series.columns.template.adapters.add("fill", function (fill, target) {
            // Verifique o país e defina a cor
            if (target.dataItem && target.dataItem.dataContext.country === "Yuan Chinês") {
              return am5.color("#ff6d00"); // Cor específica para "Euro"
            }
            return fill; // Cor padrão para outros
          });
          series.columns.template.adapters.add("fill", function (fill, target) {
            // Verifique o país e defina a cor
            if (target.dataItem && target.dataItem.dataContext.country === "Dólar Neozelandês") {
              return am5.color("#ff6d00"); // Cor específica para "Euro"
            }
            return fill; // Cor padrão para outros
          });
          series.columns.template.adapters.add("fill", function (fill, target) {
            // Verifique o país e defina a cor
            if (target.dataItem && target.dataItem.dataContext.country === "Dólar de Singapura") {
              return am5.color("#ff6d00"); // Cor específica para "Euro"
            }
            return fill; // Cor padrão para outros
          });
      
      
      
      
          
          
          series.data.setAll(data);
          
          
          // Make stuff animate on load
          // https://www.amcharts.com/docs/v5/concepts/animations/
          series.appear();
          chart.appear(1000, 100);
          
          }); // end am5.ready()


          console.log(usdToBRL)
          // usdToBRL, eurToBRL, jpyToBRL, gbpToBRL, audToBRL, cadToBRL, chfToBRL, cnyToBRL, sekToBRL, nzdToBRL, mxnToBRL, sgdToBRL
            document.getElementById('usd').textContent = `USD R$${usdToBRL}`;
            document.getElementById('eur').textContent = `EUROR R$${eurToBRL}`;
            document.getElementById('gbp').textContent = `LIBRA R$${gbpToBRL}`;
            document.getElementById('jpy').textContent = `iENE  R$${jpyToBRL}`;
            document.getElementById('cad').textContent = `Dólar Canadense R$${cadToBRL}`;
            document.getElementById('chf').textContent = `Franco Suíço R$${chfToBRL}`;
            document.getElementById('cny').textContent = `Yuan Chinês R$${cnyToBRL}`;
            document.getElementById('sek').textContent = `Coroa Sueca R$${sekToBRL}`;
            document.getElementById('nzd').textContent = `Dólar Neozelandês R$${nzdToBRL}`;
            document.getElementById('mxn').textContent = `Peso Mexicano R$${mxnToBRL}`;
            document.getElementById('sgd').textContent = ` Dólar de Singapura R$${sgdToBRL}`;

          }
          console.log(usdToBRL)


        })
        .catch(error => {
          console.error('Erro ao obter os dados:', error);
        });

        

      


        

    }
    