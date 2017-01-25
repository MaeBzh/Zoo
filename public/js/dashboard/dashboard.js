/**
 * Created by Julien-Fixe on 24/01/2017.
 */

$(document).ready(function(){

    var ctx_consomation_aliments = $("#consomationAliments").get(0).getContext("2d");

    $.get(url+"/dashboard/getStocksAliment", function(data){

        console.log(data)

        var chartConsomationAliments = new Chart(ctx_consomation_aliments, {
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
    })


});