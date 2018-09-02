$(document).ready(function(){
    setTimeout(function(){
        chart();
    }, 50)
    function chart(){
        $.ajax({
            url : "http://localhost/capstone_v2/php/emergency.php",
            type : "GET",
            success : function(data){
                console.log(data);

                var month_e = [];
                var total_e = [];

                for(var i in data) {
                    month_e.push(data[i].month);
                    total_e.push(data[i].total);
                }

                var chartdata = {
                    labels: month_e,
                    datasets: [
                        {
                            label: "Reports",
                            backgroundColor: 'rgba(200, 200, 200, 0.75)',
                            borderColor: 'rgba(200, 200, 200, 0.75)',
                            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                            data: total_e
                        }
                    ]
                };

                var ctx = $("#myChart2");

                var LineGraph = new Chart(ctx, {
                    type: 'bar',
                    data: chartdata,
                    
                });
            },
            error : function(data) {

            }
        });    
    }
    
});