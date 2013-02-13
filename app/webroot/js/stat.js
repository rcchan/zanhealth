var zanhealth = zanhealth || {};
zanhealth.pie = function (title, data, render) {
  var chart;
  $(document).ready(function() {
    // Apply the theme
    Highcharts.setOptions(Highcharts.theme);
    // Radialize the colors
    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
      return {
        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
        stops: [
            [0, color],
            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
        ]
      };
    });
  
    // Build the chart
    
    $(render).each(function(i, e){
      chart = new Highcharts.Chart({
        chart: {
          renderTo: e,
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: true
        },
        title: {
          text: title
        },
        tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage}%</b>',
          percentageDecimals: 1
        },
        plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: true,
              color: '#000000',
              connectorColor: '#000000',
              overflow: 'justify',
              distance: 10,
              softConnector: false,
              formatter: function() {
                return this.point.name;
              }
            },
            showInLegend: true
          }
        },
        legend: {
          labelFormatter: function(){
            return '<b>'+ this.name +':</b> '+ Math.round(this.y / this.series.yData.reduce(function(t, e){ return t + e; }) * 1000) / 10 +'%';
          },
          layout: 'vertical'
        },
        series: [{
            type: 'pie',
            name: title,
            data: data
        }],
        exporting: {
          buttons: {
            printButton:{
              enabled:false
            }
          }
        }
      });
    });
  });
};