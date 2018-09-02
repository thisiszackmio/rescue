$(document).ready(function(){
    setTimeout(function(){
        chart();
    }, 50)
    function chart(){
        $.ajax({
            url : "http://localhost/capstone_v2/data/chart1.php",
            type : "GET",
            success : function(data){
                console.log(data);

                var month_ni = [];
                var total_ni = [];

                for(var i in data) {
                    month_ni.push(data[i].month);
                    total_ni.push(data[i].total);
                }

                var chartdata = {
                    labels: month_ni,
                    datasets: [
                        {
                            label: "All Reports",
                            fill: false,
                            lineTension: 0.5,
                            backgroundColor: "rgba(59, 89, 152, 0.75)",
                            borderColor: "rgba(59, 89, 152, 1)",
                            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
                            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
                            data: total_ni
                        }
                    ]
                };

                var ctx = $("#myChart0");

                var LineGraph = new Chart(ctx, {
                    type: 'line',
                    data: chartdata,
                    
                });
            },
            error : function(data) {

            }
        });    
    }
    
});