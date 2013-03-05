/**************************************************************************\
* Copyright 2013 Ryan Chan <ryan@rcchan.com>                               *
*                                                                          *
* This program is free software: you can redistribute it and/or modify     *
* it under the terms of the GNU Affero General Public License as           *
* published by the Free Software Foundation, either version 3 of the       *
* License, or (at your option) any later version.                          *
*                                                                          *
* This program is distributed in the hope that it will be useful,          *
* but WITHOUT ANY WARRANTY; without even the implied warranty of           *
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            *
* GNU Affero General Public License for more details.                      *
*                                                                          *
* You should have received a copy of the GNU Affero General Public License *
* along with this program.  If not, see <http://www.gnu.org/licenses/>.    *
*                                                                          *
*                                                                          *
* Additional permission under the GNU Affero GPL version 3 section 7:      *
*                                                                          *
* If you modify this Program, or any covered work, by linking or           *
* combining it with other code, such other code is not for that reason     *
* alone subject to any of the requirements of the GNU Affero GPL           *
* version 3.                                                               *
\**************************************************************************/
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