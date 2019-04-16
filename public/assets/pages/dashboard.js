
/*
 Template Name: Lexa - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Dashboard init js
 */



!function($) {
    "use strict";

    var Dashboard = function() {};
    
    //creates area chart
    Dashboard.prototype.createAreaChart = function (element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 0,
            lineWidth: 1,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            resize: true,
            gridLineColor: '#white',
            hideHover: 'auto',
            lineColors: lineColors,
            fillOpacity: .6,
            behaveLikeLine: true,

        });
    },

    //creates Donut chart
    Dashboard.prototype.createDonutChart = function (element, data, colors) {
        Morris.Donut({
            element: element,
            data: data,
            resize: true,
            colors: colors
        });
    },

    //creates Stacked chart
    Dashboard.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            stacked: true,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eee',
            barColors: lineColors
        });
    },

    $('#sparkline').sparkline([8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
        type: 'bar',
        height: '134',
        barWidth: '10',
        barSpacing: '7',
        barColor: '#7A6FBE'
    });
  
    
    Dashboard.prototype.init = async function() {
        // {"2014-04-03T09:45": 400, "2014-04-03T09:45": 200, "2014-04-03T09:45": 400,"2014-04-03T09:45": 400....}
        /*  try {
             const result = await  fetch("/index", {})
             const data  = result.json()
             let $areaData= []
             Object.keys(data).forEach(key => {
                 $areaData.push({ y: key, a: data[key] })
             })
         } catch (err) {
             console.log(err.message)
      }*/
        //-------------------------------------------------------
        $.ajax({
            method: 'POST',
            url: '/index_data',
            success: function(data){
                console.log(data);
            },
            error:{

            }
        });
        var self = this;
         //creating area chart IWM
         $('.area-graph').each(function(index) {
             var $areaData = new Array(  {y: '2014-04-03T09:45', a:400},
                                         {y: '2014-04-03T09:46', a:350},
                                         {y: '2014-04-03T09:47', a:195},
                                         {y: '2014-04-03T09:48', a:150},
                                         {y: '2014-04-03T09:49', a:360},
                                         {y: '2014-04-03T09:50', a:120},
                                         {y: '2014-04-03T09:51', a:30},
                                         {y: '2014-04-03T09:52', a:100},
                                         {y: '2014-04-03T09:53', a:100},
                                         {y: '2014-04-03T09:54', a:100},
                                         {y: '2014-04-03T09:55', a:400},
                                         {y: '2014-04-03T09:45', a:400},
                                         {y: '2014-04-03T09:46', a:350},
                                         {y: '2014-04-03T09:47', a:195},
                                         {y: '2014-04-03T09:48', a:150},
                                         {y: '2014-04-03T09:49', a:360},
                                         {y: '2014-04-03T09:50', a:120},
                                         {y: '2014-04-03T09:51', a:30},
                                         {y: '2014-04-03T09:52', a:100},
                                         {y: '2014-04-03T09:53', a:100},
                                         {y: '2014-04-03T09:54', a:100},
                                         {y: '2014-04-03T09:55', a:400},
                                         {y: '2014-04-03T09:56', a:400},
                                         {y: '2014-04-03T09:57', a:350},
                                         {y: '2014-04-03T09:58', a:195},
                                         {y: '2014-04-03T09:59', a:150},
                                         {y: '2014-04-03T09:60', a:360},
                                         {y: '2014-04-03T09:61', a:120},
                                         {y: '2014-04-03T09:62', a:30},
                                         {y: '2014-04-03T09:63', a:100},
                                         {y: '2014-04-03T09:64', a:100},
                                         {y: '2014-04-03T09:65', a:100},
                                         {y: '2014-04-03T09:66', a:400},);


             var color = index % 2 == 0 ? '#ffa1a9' : '#1fa764'

             self.createAreaChart(this.id, 0, 0, $areaData, 'y', [ 'a'], ['Value'], [ color ]);
         })

 //-------------------------------------------------------------------------------------------------------

         //creating donut chart
         var $donutData = [
             {label: "Download Sales", value: 12},
             {label: "In-Store Sales", value: 30},
             {label: "Mail-Order Sales", value: 20}
         ];
         this.createDonutChart('morris-donut-example', $donutData, ['#f0f1f4', '#7a6fbe', '#28bbe3']);

         var $stckedData  = [
             { y: '2005', a: 45, b: 180},
             { y: '2006', a: 75,  b: 65},
             { y: '2007', a: 100, b: 90},
             { y: '2008', a: 75,  b: 65},
             { y: '2009', a: 100, b: 90},
             { y: '2010', a: 75,  b: 65},
             { y: '2011', a: 50,  b: 40},
             { y: '2012', a: 75,  b: 65},
             { y: '2013', a: 50,  b: 40},
             { y: '2014', a: 75,  b: 65},
             { y: '2015', a: 100, b: 90},
             { y: '2016', a: 80, b: 65}
         ];
         this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#28bbe3','#f0f1f4']);

    },
    //init
    $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.Dashboard.init();
}(window.jQuery);