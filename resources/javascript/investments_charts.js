var dataSeries =  [
    {        
        type: "line",
        indexLabelFontSize: 16,
        dataPoints: [
            {y: 5},
            { y: 10},
            { y: 30},
            { y: 5},
            { y: 10},
            { y: 15},
            { y: 20},
            { y: 10},
            { y: 5},
            { y: 5},
            { y: 20},
            { y: 20},
        ]
    },
    {        
        type: "line",
        indexLabelFontSize: 16,
        dataPoints: [
            {y: 25},
            { y: 5},
            { y: 20},
            { y: 20},
            { y: 40},
            { y: 50},
            { y: 40},
            { y: 40},
            { y: 10},
            { y: 20},
            { y: 30},
            { y: 20},
        ]
    },{        
        type: "line",
        indexLabelFontSize: 16,
        dataPoints: [
            {y: 10},
            { y: 10},
            { y: 30},
            { y: 5},
            { y: 10},
            { y: 15},
            { y: 20},
            { y: 10},
            { y: 5},
            { y: 5},
            { y: 20},
            { y: 20},
        ]
    },{        
        type: "line",
        indexLabelFontSize: 16,
        dataPoints: [
            {y: 35},
            { y: 10},
            { y: 30},
            { y: 5},
            { y: 10},
            { y: 15},
            { y: 20},
            { y: 10},
            { y: 5},
            { y: 5},
            { y: 20},
            { y: 20},
        ]
    }
];

window.onload = function () {
    

    window.chart = new CanvasJS.Chart("graph", {
        animationEnabled: true,
        theme: "light2",
        axisY: {
            suffix: " mln",
            includeZero: true,
            crosshair: {
                enabled: true
            }
        },
        axisX: {
            title: "Month",
        },
        data: [dataSeries[3]] 
    });
    chart.render();
}



document.addEventListener('DOMContentLoaded', function() {
    // prendo l'elemento selezionato
    var select = document.querySelector('.list_years');

    select.addEventListener('change', function() {
        // mostro il grafico che corrisponde all'anno selezionato
        chart.options.data[0] = dataSeries[select.value - 2020];
        chart.render();
    });
});




  
