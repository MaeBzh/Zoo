/**
 * Created by Julien-Fixe on 24/01/2017.
 */

$(document).ready(function(){

    $.get(url+"/dashboard/getStocksAliments", function(data){
        var ctx_stocks_aliments = $("#stocks_aliments").get(0).getContext("2d");
        var chart_stocks_aliments = new Chart(ctx_stocks_aliments, {
            type: 'bar',
            responsive: true,
            data: data,
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.yLabel;
                        }
                    }
                }
            }
        });
    });

    $.get(url+"/dashboard/getNbAnimauxZones", function(data){
        var ctx_nb_animaux_zones = $("#nb_animaux_zones").get(0).getContext("2d");
        var chart_nb_animaux_zones = new Chart(ctx_nb_animaux_zones, {
            type: 'bar',
            responsive: true,
            data: data,
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.yLabel;
                        }
                    }
                }
            }
        });
    });

    $.get(url+"/dashboard/getNbAnimauxEspeces", function(data){
        var ctx_nb_animaux_especes = $("#nb_animaux_especes").get(0).getContext("2d");
        var chart_nb_animaux_especes = new Chart(ctx_nb_animaux_especes, {
            type: 'pie',
            responsive: true,
            data: data,
            labelAlign: 'center',
            options: {
                legend: {
                    display: true
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return data.labels[tooltipItem.index]+" : "+data.datasets[0].data[tooltipItem.index];                        }
                    }
                }
            }
        });
    });

    $.get(url+"/dashboard/getAlimentsMangesJour", function(data){
        var ctx_nb_aliments_mange_jour = $("#nb_aliments_manges_jour").get(0).getContext("2d");
        var chart_nb_aliments_mange_jour = new Chart(ctx_nb_aliments_mange_jour, {
            type: 'bar',
            responsive: true,
            data: data,
            labelAlign: 'center',
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return data.labels[tooltipItem.index]+" : "+data.datasets[0].data[tooltipItem.index];                        }
                    }
                }
            }
        });
    });




    Chart.plugins.register({
        afterDatasetsDraw: function(chartInstance, easing) {
            // To only draw at the end of animation, check for easing === 1
            var ctx = chartInstance.chart.ctx;
            chartInstance.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.getDatasetMeta(i);
                if (!meta.hidden && meta.type != "line") {
                    meta.data.forEach(function(element, index) {
                        // Draw the text in black, with the specified font
                        ctx.fillStyle = 'rgb(0, 0, 0)';
                        var fontSize = 16;
                        var fontStyle = 'normal';
                        var fontFamily = 'Helvetica Neue';
                        ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
                        // Just naively convert to string for now
                        var dataString = dataset.data[index].toString();
                        // Make sure alignment settings are correct
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'middle';
                        var padding = 0;
                        var position = element.tooltipPosition();
                        ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
                    });
                }
            });
        }
    });

});