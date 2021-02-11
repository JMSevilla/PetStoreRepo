var api = 'http://localhost/ecommerce-html-template/admin/server/APIHandler.php';
function OnLoadProductAndQuantities(){
    $.ajax({
        method: 'POST',
        url: api,
        data:{
            action2: 'bargraph'
        },
        success: function(response){
            OnLoadLineGraph();
            
            chartData = response;
            var chartProperties = {
                "caption": "Report for Products and Quantities Bar Graph",
                "xAxisName": "Product Name",
                "yAxisName": "Quantities",
                "rotatevalues": "1",
                "theme": "zune"
            };
            apiChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-container',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    })
}
OnLoadProductAndQuantities();

function OnLoadLineGraph(){
    $.ajax({
        method: 'POST',
        url: api,
        data: {
            action: 'linegraph'
        },
        success: function(response){
            var d = new Date();
            var n = d.getFullYear();
            console.log(response)
            const dataSource = {
                chart: {
                  caption: "Report for Products and Quantities Line Graph",
                  yaxisname: "Product Name",
                  subcaption: "[" + n + "]",
                  numbersuffix: "Items",
                  rotatelabels: "1",
                  setadaptiveymin: "1",
                  theme: "fusion"
                },
                data: response
              }
           
      FusionCharts.ready(function() {
        var myChart = new FusionCharts({
          type: "line",
          renderAt: "chart-container-contain",
          width: "100%",
          height: "400",
          dataFormat: "json",
          dataSource
        }).render();
      });
        }
    })
    
}

