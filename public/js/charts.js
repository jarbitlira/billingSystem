/**
 * Created by CarlosRenato on 01/02/2015.
 */
$(function(){
    var sales, topProducts;
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        // Sales of last month
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Sales');
        if (typeof(sales) == 'undefined'){
            $.ajax({
                type: 'GET',
                url: 'http://admin.billingsystem/json/lastMonthSales',
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
        if (typeof(topProducts) == 'undefined'){
            $.ajax({
               url: 'http://admin.billingsystem/json/topCategories',
                type: 'GET',
                asycn: false,
                success: function(response){
                    topProducts = response;
                }
            });
        }
        console.log(topProducts);
        var pie = google.visualization.arrayToDataTable(topProducts);
        var pieOptions = {
            title: 'Top Product Categories'
        };
        var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
        pieChart.draw(pie, pieOptions);
    }

    $(window).resize(function(){
        drawChart();
    });
});