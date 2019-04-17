
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
        
        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     method: 'GET',
        //     url: '/index_data',
        //     success: function(data){
        //        



                //-HAY QUE PONER EL CODIGO AQUI





        //     },
        //     error:{

        //     }
        // });



        var self = this;
         //creating area chart IWM

         //DATA FALSA QUE SIMULA SER LO QUE DEVUELVE LA API ----------------------------

        var apiData = {
            AAPL: {
                series: {
                    data: [
                        {
                            close: 0.9995,
                            time: "2014-04-03T09:45"
                        },
                        {
                            close: 0.8895,
                            time: "2014-04-03T09:46"
                        },
                        {
                            close: 0.7775,
                            time: "2014-04-03T09:47"
                        },
                        {
                            close: 0.665,
                            time: "2014-04-03T09:48"
                        },
                        {
                            close: 0.9495,
                            time: "2014-04-03T09:49"
                        },
                        {
                            close: 0.2295,
                            time: "2014-04-03T09:50"
                        },
                        {
                            close: 0.6295,
                            time: "2014-04-03T09:51"
                        },
                    ]
                }
            },
            AMZN: {
                series: {
                    data: [
                        {
                            close: 0.6295,
                            time: "2014-04-03T09:45"
                        },
                        {
                            close: 0.7295,
                            time: "2014-04-03T09:46"
                        },
                        {
                            close: 0.9295,
                            time: "2014-04-03T09:47"
                        },
                        {
                            close: 0.3295,
                            time: "2014-04-03T09:48"
                        },
                        {
                            close: 0.9495,
                            time: "2014-04-03T09:49"
                        },
                        {
                            close: 0.2295,
                            time: "2014-04-03T09:50"
                        },
                        {
                            close: 0.6295,
                            time: "2014-04-03T09:51"
                        },
                    ]
                }
            },
            AMD: {
                series: {
                    data: [
                        {
                            close: 0.6295,
                            time: "2014-04-03T09:45"
                        },
                        {
                            close: 0.7295,
                            time: "2014-04-03T09:46"
                        },
                        {
                            close: 0.9295,
                            time: "2014-04-03T09:47"
                        },
                        {
                            close: 0.3295,
                            time: "2014-04-03T09:48"
                        },
                        {
                            close: 0.9495,
                            time: "2014-04-03T09:49"
                        },
                        {
                            close: 0.2295,
                            time: "2014-04-03T09:50"
                        },
                        {
                            close: 0.6295,
                            time: "2014-04-03T09:51"
                        },
                    ]
                }
            },
            BAC: {
                series: {
                    data: [
                        {
                            close: 0.6295,
                            time: "2014-04-03T09:45"
                        },
                        {
                            close: 0.7295,
                            time: "2014-04-03T09:46"
                        },
                        {
                            close: 0.9295,
                            time: "2014-04-03T09:47"
                        },
                        {
                            close: 0.3295,
                            time: "2014-04-03T09:48"
                        },
                        {
                            close: 0.9495,
                            time: "2014-04-03T09:49"
                        },
                        {
                            close: 0.2295,
                            time: "2014-04-03T09:50"
                        },
                        {
                            close: 0.6295,
                            time: "2014-04-03T09:51"
                        },
                    ]
                }
            },
            BHGE: {
                series: {
                    data: [
                        {
                            close: 0.6295,
                            time: "2014-04-03T09:45"
                        },
                        {
                            close: 0.7295,
                            time: "2014-04-03T09:46"
                        },
                        {
                            close: 0.9295,
                            time: "2014-04-03T09:47"
                        },
                        {
                            close: 0.3295,
                            time: "2014-04-03T09:48"
                        },
                        {
                            close: 0.9495,
                            time: "2014-04-03T09:49"
                        },
                        {
                            close: 0.2295,
                            time: "2014-04-03T09:50"
                        },
                        {
                            close: 0.6295,
                            time: "2014-04-03T09:51"
                        },
                    ]
                }
            },
            'BRK/A': {
                series: {
                    data: [
                        {
                            close: 0.6295,
                            time: "2014-04-03T09:45"
                        },
                        {
                            close: 0.7295,
                            time: "2014-04-03T09:46"
                        },
                        {
                            close: 0.9295,
                            time: "2014-04-03T09:47"
                        },
                        {
                            close: 0.3295,
                            time: "2014-04-03T09:48"
                        },
                        {
                            close: 0.9495,
                            time: "2014-04-03T09:49"
                        },
                        {
                            close: 0.2295,
                            time: "2014-04-03T09:50"
                        },
                        {
                            close: 0.6295,
                            time: "2014-04-03T09:51"
                        },
                    ]
                }
            },
        } 
        //-----------------------------------------------------------------------
        

        //ESTE CODIGO VA DENTRO DE LA FUNCION SUCCESS DEL AJAX>>>>>>>>>>>>>>>>>>>>>>>>>>
         $('.area-graph').each(function(index) {

             var symbol = $('.title-graph')[index].id

             var seriesData = apiData[symbol].series.data //CAMBIAR EL N0MBRE APIDATA POR DATA (O COMO SE LLAME EL PARAMETRO
                                                          //DE SUCCESS)

             var $areaData = []

             seriesData.forEach(function(value){
                var y = value.time
                var a = value.close

                $areaData.push({y: y, a: a})
             })

             var color = index % 2 == 0 ? '#ffa1a9' : '#1fa764'

             self.createAreaChart(this.id, 0, 0, $areaData, 'y', [ 'a'], ['Value'], [ color ]);
         })
         //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

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