window.onload = function () {

    var chart = new CanvasJS.Chart("graph", {
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
        data: [{        
            type: "line",
            indexLabelFontSize: 16,
            dataPoints: [
                {y: 450},
                { y: 414},
                { y: 520},
                { y: 460},
                { y: 450},
                { y: 500},
                { y: 480},
                { y: 480},
                { y: 410},
                { y: 500},
                { y: 480},
                { y: 510},
            ]
        }]
    });
    chart.render();
}
