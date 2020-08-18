

function saveToCart($id,$customerID){

	var response='';
       var status='';
      $.ajax({

                type: "GET",
                 url: "php/checkSession.php",
                 async: false,
                 success : function(text)
                 {
                     response = text;
                 }
      });


      if(response){
          //alert("Acive session");

          var itemID=$id;
          var customerID=$customerID;
          $.ajax({

                type: "POST",
                 url: "php/addItemOnCart.php",
                 async: false,
                 data: {itemID:itemID,customerID:customerID},
                 success : function(text)
                 {
                     status = text;
                 }
      });
			//swal("Success!", status, "success");
          alert(status);

      }

      else{
        alert("no active session.Please Login.");

      }

}


function updateQty($itemID,$customerID)
{

	var itemID=$itemID;
	var customerID=$customerID;
	var newQty=prompt("Enter new Quantity","");
	$.ajax({

                type: "POST",
                 url: "php/updateQty.php",
                 async: false,
                 data: {itemID:itemID,customerID:customerID,newQty:newQty},
                 success : function(text)
                 {
                     status = text;
                 }
      });

	alert(status);


}

function removeItem($itemID,$customerID)
{

	var itemID=$itemID;
	var customerID=$customerID;
	$.ajax({

                type: "POST",
                 url: "php/removeItem.php",
                 async: false,
                 data: {itemID:itemID,customerID:customerID},
                 success : function(text)
                 {
                     status = text;
                 }
      });

	alert(status);


}

function searchItem()
{
  alert('okay');
}

function subscribe()
{
	var email = document.getElementById('subscription_email').value;
	$.ajax({
		type: "POST",
		url: "./php/subscribe.php",
		async: false,
		data: {email:email},
		success: function(text)
		{
			alert(text);
		}
	});
	//alert(email);
}


//added later for favorite item
function saveToFavorite($id,$customerID){

	var response='';
       var status='';
      $.ajax({

                type: "GET",
                 url: "php/checkSession.php",
                 async: false,
                 success : function(text)
                 {
                     response = text;
                 }
      });


      if(response){
          //alert("Acive session");
					status = '';
          var itemID=$id;
          var customerID=$customerID;
          $.ajax({

                type: "POST",
                 url: "php/addItemOnFavorite.php",
                 async: false,
                 data: {itemID:itemID,customerID:customerID},
                 success : function(text)
                 {
                     status = text;
                 }
      });

          //alert(status);
					swal("Success!", status, "success");

      }

      else{
        alert("no active session.Please Login.");

      }


}

function removeItemFromFavorite($itemID,$customerID)
{
	var status = '';
	var itemID=$itemID;
	var customerID=$customerID;
	$.ajax({

                type: "POST",
                 url: "php/removeItemFromFavorite.php",
                 async: false,
                 data: {itemID:itemID,customerID:customerID},
                 success : function(text)
                 {
                     status = text;
                 }
      });


	alert(status);
	location.reload();
	//swal("Success!", status, "success");
}

function removeCard($customerID){
	var customerID=$customerID;
	$.ajax({

                type: "POST",
                 url: "php/removeCard.php",
                 async: false,
                 data: {customerID:customerID},
                 success : function(text)
                 {
                     status = text;
                 }
      });

	alert(status);
	location.reload();
}


function forgotPassword(){
	var email = document.getElementById('email').value;
	$.ajax({

                type: "POST",
                 url: "php/forgot_password_process.php",
                 async: false,
                 data: {email:email},
                 success : function(text)
                 {
                     status = text;
                 }
      });
			//alert(status);
	alert("Please Check your Email. The reset link is sent if the account exists");
	//swal("Please Check your Email. The reset link is sent if the account exists", status, "success");

	//alert(email);

}

function resetPassword($customerID){
	var customerID=$customerID;
	var newPassword = document.getElementById('new_password').value;
	var newConfirmPassword = document.getElementById('new_confirm_password').value;
	if(newPassword == newConfirmPassword){
		console.log("done");
		$.ajax({
	                type: "POST",
	                 url: "php/resetPasswordTest.php",
	                 async: false,
	                 data: {customerID:customerID, newPassword:newPassword},
	                 success : function(text)
	                 {
	                     status = text;
											 if(status){
												 swal("Successfully Changed the password", "", "success");
											 }

	                 }
	      });

	}
	else{
			swal("Couldn't change the password");
	}

}

function postFeedback(){
//alert("function caleld");
	var rateValue = "";
	var radios = document.getElementsByName('experience');
	console.log(radios);
	for (var i = 0, length = radios.length; i < length; i++) {
	    if (radios[i].checked) {
	        rateValue = radios[i].value;
					break;
	    }
	}
	var comments = document.getElementById('comments').value;
	var name =  document.getElementById('name').value;
	var email =  document.getElementById('email').value;
	if(comments != "" && name != "" && email != "" && rateValue != ""){
		$.ajax({
									type: "POST",
									 url: "php/postFeedback.php",
									 async: false,
									 data: {comments:comments, name:name, email:email, rateValue:rateValue},
									 success : function(text)
									 {
											 status = text;


									 }
				});

				if(status){
					swal("Successfully Posted the feedback", "", "success");
				}
				else{
					swal("Couldn\'t Post the feedback", "", "error");
				}
	}
	else{
		swal("Please input all the fields", "", "error");
	}

}

function postMessages(){
//alert("function caleld");

	var message = document.getElementById('message-text').value;
	var email =  document.getElementById('message-email').value;
	if(message != "" && email != ""){
		$.ajax({
									type: "POST",
									 url: "php/postMessage.php",
									 async: false,
									 data: {message:message, email:email},
									 success : function(text)
									 {
											 status = text;


									 }
				});

				if(status){
					swal("Successfully sent the Message", "", "success");
				}
				else{
					swal("Couldn't send the message", "", "error");
				}
	}
	else{
		swal("Please input all the fields", "", "error");
	}

}

//signup login_validate
function signUpValidate(){

var first_name = document.getElementById('first_name').value;
	var last_name = document.getElementById('last_name').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var mobile = document.getElementById('mobile').value;
	var gender = "";
	var radios = document.getElementsByName('gender');
	for (var i = 0, length = radios.length; i < length; i++) {
			if (radios[i].checked) {
					gender = radios[i].value;
					break;
			}
	}
	console.log(first_name+last_name+email+password+mobile+gender);

	if(first_name != "" && last_name != "" && email != "" && password != "" && mobile != "" && gender != ""){
		console.log(first_name+last_name+email+password+mobile+gender);
		$.ajax({
									type: "POST",
									 url: "php/sign_up_validate.php",
									 async: false,
									 data: {first_name:first_name, last_name:last_name, email:email, password:password, mobile:mobile, gender:gender},
									 success : function(text)
									 {
											 status = text;

									 }
				});

				if(status==1){
				 swal("Successfully created the Account", "Please check you email to verify your account", "success");

			 }
			 else{
				 swal("Couldn't create the account", "", "error");
			 }

	}

	else{
		swal("Please input all the fields", "", "error");
	}


}
//end of signup validate


//google maps start
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -33.912555, lng: 150.9682705};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 18, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}

//google map end
