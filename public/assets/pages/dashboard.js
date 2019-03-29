
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
        //-------------------------------------------------------

        //creating area chart IWM
        var $areaData = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:150},
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
            {y: '2014',  a:150},
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
            {y: '2014',  a:150},
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
            {y: '2014', a:150},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];

        this.createAreaChart('morris-area-example4', 0, 0, $areaData4, 'y', ['a'], ['Value'], ['#ffa1a9']);


        //creating area chart TEST 5
        var $areaData5 = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:50},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];
        this.createAreaChart('morris-area-example5', 0, 0, $areaData5, 'y', [ 'a'], ['Value'], [ '#ffa1a9']);

        //creating area chart  TEST6
        var $areaData6 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:150},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example6', 0, 0, $areaData6, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart TEST7
        var $areaData7 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:150},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example7', 0, 0, $areaData7, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart TEST8
        var $areaData8 = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:21},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];

        this.createAreaChart('morris-area-example8', 0, 0, $areaData8, 'y', ['a'], ['Value'], ['#ffa1a9']);

        //creating area chart TEST 9
        var $areaData9 = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:150},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];
        this.createAreaChart('morris-area-example9', 0, 0, $areaData9, 'y', [ 'a'], ['Value'], [ '#ffa1a9']);

        //creating area chart  TEST10
        var $areaData10 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:150},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example10', 0, 0, $areaData10, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart TEST11
        var $areaData11 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:21},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example11', 0, 0, $areaData11, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart TEST12
        var $areaData12 = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:150},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];

        this.createAreaChart('morris-area-example12', 0, 0, $areaData12, 'y', ['a'], ['Value'], ['#ffa1a9']);


        //creating area chart test13
        var $areaData13 = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:150},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];
        this.createAreaChart('morris-area-example13', 0, 0, $areaData13, 'y', [ 'a'], ['Value'], [ '#ffa1a9']);

        //creating area chart TEST14
        var $areaData14 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:150},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example14', 0, 0, $areaData14, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart TEST15
        var $areaData15 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:21},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example15', 0, 0, $areaData15, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart TEST16
        var $areaData16 = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:21},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];

        this.createAreaChart('morris-area-example16', 0, 0, $areaData16, 'y', ['a'], ['Value'], ['#ffa1a9']);


        //creating area chart TEST 17
        var $areaData17 = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:21},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];
        this.createAreaChart('morris-area-example17', 0, 0, $areaData17, 'y', [ 'a'], ['Value'], [ '#ffa1a9']);

        //creating area chart  TEST18
        var $areaData18 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:21},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example18', 0, 0, $areaData18, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart TEST19
        var $areaData19 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:21},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example19', 0, 0, $areaData19, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart TEST20
        var $areaData20 = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:21},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];

        this.createAreaChart('morris-area-example20', 0, 0, $areaData20, 'y', ['a'], ['Value'], ['#ffa1a9']);

        //creating area chart TEST 21
        var $areaData21 = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:21},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];
        this.createAreaChart('morris-area-example21', 0, 0, $areaData21, 'y', [ 'a'], ['Value'], [ '#ffa1a9']);

        //creating area chart  TEST22
        var $areaData22 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:21},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example22', 0, 0, $areaData22, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart TEST23
        var $areaData23 = [
            {y: '2011',  a:400},
            {y: '2012',  a:350},
            {y: '2013',  a:195},
            {y: '2014',  a:50},
            {y: '2015',  a:360},
            {y: '2016',  a:120},
            {y: '2017',  a:30}
        ];

        this.createAreaChart('morris-area-example23', 0, 0, $areaData23, 'y', ['a'], ['Value'], ['#1fa764']);

        //creating area chart TEST24
        var $areaData24 = [
            {y: '2011', a:400},
            {y: '2012', a:350},
            {y: '2013', a:195},
            {y: '2014', a:50},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:30}
        ];

        this.createAreaChart('morris-area-example24', 0, 0, $areaData24, 'y', ['a'], ['Value'], ['#ffa1a9']);

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