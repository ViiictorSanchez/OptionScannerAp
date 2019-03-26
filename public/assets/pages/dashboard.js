
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
  
    
    Dashboard.prototype.init = function() {
        
        //creating area chart IWM
        var $areaData = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:21},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];
        this.createAreaChart('morris-area-example', 0, 0, $areaData, 'y', [ 'a'], ['Value'], [ '#ffa1a9']);

        //creating area chart QQQ
        var $areaData2 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:21},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example2', 0, 0, $areaData2, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart SPY
        var $areaData3 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:21},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example3', 0, 0, $areaData3, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart DIA
        var $areaData4 = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:21},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];

        this.createAreaChart('morris-area-example4', 0, 0, $areaData4, 'y', ['a'], ['Value'], ['#ffa1a9']);


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