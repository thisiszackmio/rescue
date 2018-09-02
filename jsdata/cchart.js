$(document).ready(function(){
    setTimeout(function(){
        chart();
    }, 50)
    function chart(){
        $.ajax({
            url : "http://localhost/capstone_v2/php/crime.php",
            type : "GET",
            success : function(data){
                console.log(data);

                var month_c = [];
                var total_c = [];

                for(var i in data) {
                    month_c.push(data[i].month);
                    total_c.push(data[i].total);
                }

                var chartdata = {
                    labels: month_c,
                    datasets: [
                        {
                            label: "Reports",
                            backgroundColor: 'rgba(200, 200, 200, 0.75)',
                            borderColor: 'rgba(200, 200, 200, 0.75)',
                            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                            data: total_c
                        }
                    ]
                };

                var ctx = $("#myChart1");

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