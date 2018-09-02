$(function () 
{
  $.ajax({                                       
    url: 'http://localhost/capstone_v2/php/incident.php',                          
    data: "",                                                                                
    dataType: 'json',                   
    success: function(data)          
      {
        var incident = [];  

        for(var i in data){
          incident.push(data[i].total)
        }                  
        $('#txtHint1').html(incident); //Set output element html
      } 
  }, 1000);
}); 