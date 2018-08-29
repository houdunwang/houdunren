(function ($) {

    if ($('.dashboard-page').length) {
        /* legent font family */
        var ctxFont = "'Rubik', sans-serif",
            ctxTickColor = '#8896a5',
            months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];



        /* set chart js flobal style */
        Chart.defaults.global.defaultFontFamily = ctxFont;
        Chart.defaults.global.defaultFontColor = "#898b96";
        Chart.defaults.global.defaultFontSize = 16;



        /* custom legend function */
        function customLegend(chart) {
            var text = [];
            text.push('<ul class="piechart' + chart.id + '-legend">');
            var data = chart.data;
            var datasets = data.datasets;
            var labels = data.labels;
            if (datasets.length) {
                /*check if the type of the chart is line and take length accordingly for iteration*/
                var dataLength = chart.config.type === "line" ? datasets.length : datasets[0].backgroundColor.length;

                /*set the data source according to type*/
                function getData(i) {
                    return (
                        [chart.config.type === "line" ? datasets[i].borderColor : datasets[0].backgroundColor[i],
                        chart.config.type === "line" ? datasets[i].label : data.labels[i]]);
                }

                /* loop through data to generate html */
                for (var i = 0; i < dataLength; ++i) {
                    text.push('<li><span style="background-color:' + (getData(i)[0]) + '"></span>');
                    text.push(getData(i)[1]);
                    text.push('</li>');
                }

                text.push('</ul>');
                return text.join('');
            }

        }

        /* Plugin for piechart */
        var piePlugin = {
            beforeDraw: function (chart) {
                var width = chart.chart.width,
                    height = chart.chart.height,
                    ctx = chart.chart.ctx,
                    p = 0;
                chart.data.datasets[0].data.map(function (t) {
                    if (typeof t === 'number' && !isNaN(t)) {
                        p += t;
                    }
                });

                ctx.restore();
                var fontSize = (height / 114).toFixed(2);
                ctx.font = fontSize + "em Quicksand";
                ctx.textBaseline = "middle";

                var text = p + ' Visit',
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2;

                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        };


        /* sale view statistics line chart */
        var ctx = $('#myChart');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: [5, 10, 15, 20, 25, 30],
                datasets: [
                    {
                        label: "Daily Views",
                        backgroundColor: 'rgba(0, 71, 193,.5)',
                        borderColor: '#f4516c',
                        data: [5, 17, 13, 23, 18, 16],
                        pointBackgroundColor: '#f4516c',
                        pointBorderColor: '#f4516c',
                        fill: false,
                        borderWidth: 2.5
                    },
                    {
                        label: "Daily Sale",
                        backgroundColor: 'rgba(5, 116, 236,.5)',
                        borderColor: '#0674ec',
                        data: [10, 12, 17, 19, 15, 9],
                        pointBackgroundColor: '#36a3f7',
                        pointBorderColor: '#36a3f7',
                        fill: false,
                        borderWidth: 2.5
                    }]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: 40,
                            fontColor: ctxTickColor
                        }
                    }]
                },
                legend: {
                    display: false
                },
                legendCallback: customLegend
            }
        });
        /* genereate legend for sale view chart */
        var legendSale = chart.generateLegend();
        $('#stat_legend').html(legendSale);




        /* visit statistics pie chart */
        var piechart = $('#piechart');
        var part = new Chart(piechart, {
            type: 'doughnut',
            plugins: [piePlugin],
            data: {
                datasets: [{
                    data: [120, 90, 70],
                    backgroundColor: [
                        '#34bfa3',
                        '#f4516c',
                        '#36a3f7'
                    ]
                }],
                labels: [
                    "Google",
                    "Website",
                    "Other"
                ]
            },
            options: {
                cutoutPercentage: 75,
                responsive: true,
                legend: {
                    display: false
                },
                legendCallback: customLegend
            }
        });
        /* genereate legend for visitor pie chart */
        var legend = part.generateLegend();
        $('#pie-legend').html(legend);




        /* single item view statistics */
        var item_view = $('#single_item_visit');
        var viewBar = new Chart(item_view, {
            type: 'bar',

            data: {
                labels: [3, 6, 9, 12, 15, 18, 21, 24, 27, 30],
                datasets: [
                    {
                        data: [15, 14, 23, 48, 55, 25, 82, 33, 55, 41, 2],
                        backgroundColor: '#5867dd'
                    }
                ]
            },

            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: 60
                        }
                    }],
                    xAxes: [{
                        barThickness: 40
                    }]
                },
                legend: {
                    display: false
                }
            }
        });




        /* revenue chart */
        var revenue = $('#revenue');
        var reveChart = new Chart(revenue, {
            type: 'line',

            data: {
                labels: months,
                datasets: [
                    {
                        label: "2015",
                        data: [3, 2.9, 2.7, 3.5, 4, 3.8, 3.7, 3.5, 4, 4.5, 4.3, 4.2],
                        fill: false,
                        borderColor: '#5867dd',
                        lineTension: 0,
                        pointBorderColor: '#5867dd'
                    },
                    {
                        label: "2016",
                        data: [4, 3.9, 3.7, 4.5, 5, 5.8, 5.1, 4.5, 5.7, 7, 6.25, 5.9],
                        fill: false,
                        borderColor: '#34bfa3',
                        lineTension: 0,
                        pointBorderColor: '#34bfa3'
                    },
                    {
                        label: "2017",
                        data: [5, 5.5, 5.9, 5.5, 5, 4.8, 5.8, 6.5, 6.1, 5.8, 6.7, 7.2],
                        fill: false,
                        borderColor: '#36a3f7',
                        lineTension: 0,
                        pointBorderColor: '#36a3f7'
                    }
                ]
            },

            options: {
                legend: {
                    display: false
                },
                legendCallback: customLegend,
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMax: 10,
                            callback: function (value, index, values) {
                                return value + 'k';
                            }
                        }
                    }]
                },
                elements: {
                    point: {
                        backgroundColor: '#fff',
                        borderWidth: 3
                    }
                }
            }
        });
        /* generate revenue chart lagend */
        var visitLegend = reveChart.generateLegend();
        $('#visit_legend').html(visitLegend);
    }

})(jQuery);