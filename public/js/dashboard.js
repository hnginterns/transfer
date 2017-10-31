var as = {};

as.dashboard = {};

as.dashboard.initChart = function () {
    var data = {
        labels: months,
        datasets: [
            {
                label: trans.chartLabel,
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: topups
            }
        ]
    };

    var ctx = document.getElementById("myChart").getContext("2d");
    var myLineChart = new Chart(ctx).Line(data, {
        responsive: true,
        maintainAspectRatio: false,
        tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %> "+trans.new+" <%= value == 1 ? '"+trans.topup+"' : '"+trans.topups+"' %>",
    });
};

$(document).ready(function () {
    as.dashboard.initChart();
});