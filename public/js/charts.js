/**
 * Created by CarlosRenato on 01/02/2015.
 */
$(function(){
    var sales = '';
    var topProducts = '';
    var browsers = '';
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        // Sales of last month
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Sales');
        if (sales == ''){
            $.ajax({
                type: 'GET',
                url: '/json/lastMonthSales',
                async: false,
                success: function(response){
                    sales = response;
                }
            });
        }
        data.addRows(sales);
        var options = {
            chart: {
                title: 'Sales of last month',
                subtitle: 'Invoice report'
            }
        };
        var chart = new google.charts.Line(document.getElementById('monthSales'));
        chart.draw(data, options);

        // Product Categories
        if (topProducts == ''){
            $.ajax({
                url: '/json/topCategories',
                type: 'GET',
                asycn: false,
                success: function(response){
                    topProducts = response;
                }
            });
        }
        var pie = google.visualization.arrayToDataTable(topProducts);
        var pieOptions = {
            title: 'Top Product Categories',
            is3D: true
        };
        var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
        pieChart.draw(pie, pieOptions);

        // Browsers
        if (browsers == ''){
            $.ajax({
                url: '/json/browserAccess',
                type: 'GET',
                async: false,
                success: function(response){
                    browsers = response;
                }
            })
        }
        var browserCont = google.visualization.arrayToDataTable(browsers);

        var optionsBrowsers = {
            title: 'Browser access',
            pieHole: 0.4,
            pieStartAngle: 100,
            pieSliceText: 'label'
        };

        var pieBrowser = new google.visualization.PieChart(document.getElementById('donutBrowser'));
        pieBrowser.draw(browserCont, optionsBrowsers);

    }

    $(window).resize(function(){
        drawChart();
    });
});