/* ------------------------------------------------------------------------------
 *
 *  # Google Visualization - lines
 *
 *  Google Visualization line chart demonstration
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */


// Line chart
// ------------------------------

// Initialize chart
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawLineChart);


// Chart settings
function drawLineChart() {

    // Data
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Viewed', 'Applied', 'Hired'],
        ['2004',  300,      400, 200],
        ['2005',  220,      460, 200],
        ['2006',  330,       1120, 100],
        ['2007',  1030,      540, 50]
    ]);

    // Options
    var options = {
        fontName: 'Roboto',
        height: 500,
        curveType: 'function',
        fontSize: 12,
        chartArea: {
            left: '5%',
            width: '50%',
            height: 450
        },
        pointSize: 4,
        tooltip: {
            textStyle: {
                fontName: 'Roboto',
                fontSize: 13
            }
        },
        vAxis: {
            title: 'Total users',
            titleTextStyle: {
                fontSize: 13,
                italic: false
            },
            gridlines:{
                color: '#e5e5e5',
                count: 10
            },
            minValue: 0
        },
        legend: {
            position: 'right',
            alignment: 'center',
            textStyle: {
                fontSize: 25
            }
        }
    };

    // Draw chart
    var line_chart = new google.visualization.LineChart($('#google-line')[0]);
    line_chart.draw(data, options);
}


// Resize chart
// ------------------------------

$(function () {

    // Resize chart on sidebar width change and window resize
    $(window).on('resize', resize);
    $(".sidebar-control").on('click', resize);

    // Resize function
    function resize() {
        drawLineChart();
    }
});
