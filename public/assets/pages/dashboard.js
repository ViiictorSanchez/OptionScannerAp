
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

        var self = this;
        var symbols = $('.title-graph');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            url: '/index_data',
            success: function(data){


                console.log(data)

                var seriesData = []
                var $areaData = []

                $('.area-graph').each(function(index) {
                    var symbol;
                    try{
                        symbol  = symbols[index].id
                    }catch(err){
                        return false;
                    }




                    data.forEach(function(value){


                        if( value[0].name == symbol ) {
                            try{
                                seriesData = value.all_data.series.data

                            }catch(err){
                                seriesData = [
                                    {
                                        time: "2019-04-17T09:30:00",
                                        close: 0
                                    },
                                    {
                                        time: "2019-04-17T09:35:00",
                                        close: 0
                                    },
                                    {
                                        time: "2019-04-17T09:40:00",
                                        close: 0
                                    },
                                    {
                                        time: "2019-04-17T09:45:00",
                                        close: 0
                                    },
                                    {
                                        time: "2019-04-17T09:50:00",
                                        close: 0
                                    },

                                ]
                            }

                        }
                    })

                    seriesData.forEach(function(value, index){
                        var y = value.time
                        var a = value.close

                        if(index < 10) $areaData.push({y: y, a: a})
                    })

                    var color = index % 2 == 0 ? '#ffa1a9' : '#1fa764'

                    self.createAreaChart('morris-area-example-' + index, 0, 0, $areaData, 'y', [ 'a'], ['Value'], [ color ]);
                    $areaData = []
                })

            },
            error:{

            }
        });







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
