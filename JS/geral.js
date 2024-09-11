var usdToBRL
var eurToBRL
var jpyToBRL
var gbpToBRL
var audToBRL
var cadToBRL
var chfToBRL
var cnyToBRL
var sekToBRL
var nzdToBRL
var mxnToBRL
var sgdToBRL
var hkdToBRL
var krwToBRL
var tryToBRL
var rubToBRL
var zarToBRL
var nokToBRL
var aedToBRL
var arsToBRL
var clpToBRL
var copToBRL
var hufToBRL
var ilsToBRL
var myrToBRL
var phpToBRL
var plnToBRL
var thbToBRL
var vndToBRL
var lkrToBRL
var rsdToBRL
var czkToBRL
var murToBRL
var kesToBRL
var bhdToBRL
var kwdToBRL
var qarToBRL
var omrToBRL
var jodToBRL
var bndToBRL
var twdToBRL
var penToBRL
var inrToBRL  
var qmrToBRL 
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
      const agora = new Date();
        console.log(agora)
        var data =  document.getElementById('data')
        data.innerText = "Cotação para o dia: " + agora.getDate() + "/" + agora.getMonth() + "/" + agora.getFullYear()

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

            //data
            

            // Calcula quantos reais são necessários para comprar uma unidade da moeda
               // Calcula quantos reais são necessários para comprar uma unidade da moeda
               usdToBRL = (1 / data.USD).toFixed(2);
               eurToBRL = (1 / data.EUR).toFixed(2);
               jpyToBRL = (1 / data.JPY).toFixed(2);
               gbpToBRL = (1 / data.GBP).toFixed(2);
               audToBRL = (1 / data.AUD).toFixed(2);
               cadToBRL = (1 / data.CAD).toFixed(2);
               chfToBRL = (1 / data.CHF).toFixed(2);
               cnyToBRL = (1 / data.CNY).toFixed(2);
               sekToBRL = (1 / data.SEK).toFixed(2);
               nzdToBRL = (1 / data.NZD).toFixed(2);
               mxnToBRL = (1 / data.MXN).toFixed(2);
               sgdToBRL = (1 / data.SGD).toFixed(2);
               hkdToBRL = (1 / data.HKD).toFixed(2);
               krwToBRL = (1 / data.KRW).toFixed(2);
               tryToBRL = (1 / data.TRY).toFixed(2);
               rubToBRL = (1 / data.RUB).toFixed(2);
               zarToBRL = (1 / data.ZAR).toFixed(2);
               nokToBRL = (1 / data.NOK).toFixed(2);
               aedToBRL = (1 / data.AED).toFixed(2);
               arsToBRL = (1 / data.ARS).toFixed(2);
               clpToBRL = (1 / data.CLP).toFixed(2);
               copToBRL = (1 / data.COP).toFixed(2);
               hufToBRL = (1 / data.HUF).toFixed(2);
               ilsToBRL = (1 / data.ILS).toFixed(2);
               myrToBRL = (1 / data.MYR).toFixed(2);
               phpToBRL = (1 / data.PHP).toFixed(2);
               plnToBRL = (1 / data.PLN).toFixed(2);
               thbToBRL = (1 / data.THB).toFixed(2);
               vndToBRL = (1 / data.VND).toFixed(2);
               lkrToBRL = (1 / data.LKR).toFixed(2);
               rsdToBRL = (1 / data.RSD).toFixed(2);
               czkToBRL = (1 / data.CZK).toFixed(2);
               murToBRL = (1 / data.MUR).toFixed(2);
               kesToBRL = (1 / data.KES).toFixed(2);
               bhdToBRL = (1 / data.BHD).toFixed(2);
               kwdToBRL = (1 / data.KWD).toFixed(2);
               qarToBRL = (1 / data.QAR).toFixed(2);
               omrToBRL = (1 / data.OMR).toFixed(2);
               jodToBRL = (1 / data.JOD).toFixed(2);
               bndToBRL = (1 / data.BND).toFixed(2);
               twdToBRL = (1 / data.TWD).toFixed(2);
               penToBRL = (1 / data.PEN).toFixed(2);
               inrToBRL = (1 / data.INR).toFixed(2);
               qmrToBRL = (1 / data.QMR).toFixed(2);


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
            icon: "../JS/img/bandeiras/autralia.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Dólar Canadense",
            visits:parseFloat(Geral[5]) ,
            icon: "../JS/img/bandeiras/canada.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Franco Suíço",
            visits: parseFloat(Geral[6]),
            icon: "../JS/img/bandeiras/suica.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Yuan Chinês",
            visits: parseFloat(Geral[7]),
            icon: "../JS/img/bandeiras/china.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Coroa Sueca",
            visits: parseFloat(Geral[8]),
            icon: "../JS/img/bandeiras/suecia.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Dólar Neozelandês",
            visits: parseFloat(Geral[9]),
            icon: "../JS/img/bandeiras/nova-zelandia.svg",
            columnSettings: { fill: colors.next() }
          }, {
            country: "Peso Mexicano",
            visits: parseFloat(Geral[10]),
            icon: "../JS/img/bandeiras/mexico.svg",
            columnSettings: { fill: colors.next() }
          },{
            country: "Dólar de Singapura",
            visits: parseFloat(Geral[11]),
            
            icon: "../JS/img/bandeiras/singapura.svg",
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

    function mudou() {
      const val =  document.getElementById('valor');
      const symbol = document.getElementById('currencySelect').value
      val.innerText = "BRL > " + symbol
    }
    
    function calc() {
            const val = document.getElementById('num').value;
            const result =  document.getElementById('rest');
            const symbol = document.getElementById('currencySelect').value
            console.log(symbol)
            
            switch (symbol) {
                case "USD":
                  var vlr = (val / usdToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "EUR":
                  var vlr = (val / eurToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "JPY":
                  var vlr = (val / jpyToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "GBP":
                  var vlr = (val / gbpToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "AUD":
                  var vlr = (val / audToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                
                break;
                case "CAD":
                  var vlr = (val / cadToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "CHF":
                  var vlr = (val / chfToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "CNY":
                  var vlr = (val / cnyToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "NZD":
                  var vlr = (val / nzdToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "INR":
                  var vlr = (val / inrToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "MXN":
                  var vlr = (val / mxnToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "SGD":
                  var vlr = (val / sgdToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "TRY":
                  var vlr = (val / tryToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "RUB":
                  var vlr = (val / rubToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "ZAR":
                  var vlr = (val / zarToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "SEK":
                  var vlr = (val / sekToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "NOK":
                  var vlr = (val / nokToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "AED":
                  var vlr = (val / aedToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "ARS":
                  var vlr = (val / arsToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "CLP":
                  var vlr = (val / clpToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "HUF":
                  var vlr = (val / hufToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "ILS":
                  var vlr = (val / ilsToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "MYR":
                  var vlr = (val / myrToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "PHP":
                  var vlr = (val / phpToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "PLN":
                  var vlr = (val / plnToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "THB":
                  var vlr = (val / thbToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "LKR":
                  var vlr = (val / lkrToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "RSD":
                  var vlr = (val / rsdToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "CZK":
                  var vlr = (val / czkToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "MUR":
                  var vlr = (val / murToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "KES":
                  var vlr = (val / kesToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "BHD":
                  var vlr = (val / bhdToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "KWD":
                  var vlr = (val / kwdToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "QAR":
                  var vlr = (val / qarToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "OMR":
                  var vlr = (val / omrToBRL).toFixed(2)           
                  result.innerText = "$"+ vlr
                break;
                case "JOD":
                  var vlr = (val / jodToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "BND":
                  var vlr = (val / bndToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "TWD":
                  var vlr = (val / twdToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
                case "PEN":
                  var vlr = (val / penToBRL).toFixed(2)              
                  result.innerText = "$"+ vlr
                break;
              default:
                break;
            }



  
}