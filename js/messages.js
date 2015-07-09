var myurl = window.location.pathname;

$(document).ready(function()
{   
    $("#send").click(function()
    {       
     $.ajax({
         type: "POST",
         url: myurl + "/post_action", 
         data: {textbox: $("#textbox").val()},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
     return false;
     });
 });


