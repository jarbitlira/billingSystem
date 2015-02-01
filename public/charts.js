/**
 * Created by CarlosRenato on 01/02/2015.
 */
$(function(){
    var sales;
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Sales');
        console.log(sales);
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
        //var chart = new google.visualization.AreaChart(document.getElementById('monthSales'));
        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart();
    });
});