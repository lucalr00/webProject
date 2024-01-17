var dataSeries =  [
    {        
        type: "line",
        indexLabelFontSize: 16,
        dataPoints: [
            {x:1,y: 5},
            {x:2,y: 10},
            {x:3, y: 30},
            {x:4, y: 5},
            {x:5, y: 10},
            {x:6, y: 15},
            {x:7, y: 20},
            {x:8, y: 10},
            {x:9, y: 5},
            {x:10, y: 5},
            {x:11, y: 20},
            {x:12, y: 20},
        ]
    },
    {        
        type: "line",
        indexLabelFontSize: 16,
        dataPoints: [
            {x:1,y: 25},
            {x:2, y: 5},
            {x:3, y: 20},
            {x:4, y: 20},
            {x:5, y: 40},
            {x:6, y: 50},
            {x:7, y: 40},
            {x:8, y: 40},
            {x:9, y: 10},
            {x:10, y: 20},
            {x:11, y: 30},
            {x:12, y: 20},
        ]
    },{        
        type: "line",
        indexLabelFontSize: 16,
        dataPoints: [
            {x:1,y: 10},
            {x:2, y: 10},
            {x:3, y: 30},
            {x:4, y: 5},
            {x:5, y: 10},
            {x:6, y: 15},
            {x:7, y: 20},
            {x:8, y: 10},
            {x:9, y: 5},
            {x:10, y: 5},
            {x:11, y: 20},
            {x:12, y: 20},
        ]
    },{        
        type: "line",
        indexLabelFontSize: 16,
        dataPoints: [
            {x:1,y: 35},
            { x:2,y: 10},
            { x:3,y: 30},
            { x:4,y: 5},
            { x:5,y: 10},
            { x:6,y: 15},
            { x:7,y: 20},
            { x:8,y: 10},
            { x:9,y: 5},
            { x:10,y: 5},
            { x:11,y: 20},
            { x:12,y: 20},
        ]
    }
];

window.onload = function () {
    

    window.chart = new CanvasJS.Chart("graph", {
        animationEnabled: true,
        theme: "light2",
        axisX: {
            interval: 1,
            minimum: 0.75,
            valueFormatString: "0",
            title: "Month"
        },
        axisY: {
            suffix: " mln",
            includeZero: true,
            crosshair: {
                enabled: true
            }
        },
        data: [dataSeries[3]] 
    });
    chart.render();
}



document.addEventListener('DOMContentLoaded', function() {
    // prendo l'elemento selezionato
    var select = document.querySelector('#list_years');

    select.addEventListener('change', function() {
        // mostro il grafico che corrisponde all'anno selezionato
        chart.options.data[0] = dataSeries[select.value - 2020];
        chart.render();
    });
});




  
