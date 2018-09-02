$(function () 
{
  $.ajax({                                      
    url: 'http://localhost/capstone/php/responders.php',                          
    data: "",                        
                                                                   
    dataType: 'json',                   
    success: function(data)          
      {
        var res = [];  

        for(var i in data){
          res.push(data[i].total)
        }                  
        $('#txtHint2').html(res); //Set output element html
      } 
  }, 1000);
}); 