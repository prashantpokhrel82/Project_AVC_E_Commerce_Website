$(document).ready(function() {
  var response='';
  $.ajax({

            type: "GET",
             url: "php/checkSession.php",
             async: false,
             success : function(text)
             {
                 response = text;
             }
  });

  var name='';

  if(response){
      //alert("Acive session")
      $(".sessionElement").css("display","inline-block");

  }
  else{
    //alert("no active session");
    $(".noSessionElement").css("display","inline-block");

  }

});
