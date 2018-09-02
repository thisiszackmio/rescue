$(function () 
{
  $.ajax({                                      
    url: 'http://localhost/capstone_v2/php/user.php',                          
    data: "",                        
                                                                   
    dataType: 'json',                   
    success: function(data)          
      {
        var user = [];  

        for(var i in data){
          user.push(data[i].total)
        }                  
        $('#txtHint').html(user); //Set output element html
      } 
  }, 1000);
}); 