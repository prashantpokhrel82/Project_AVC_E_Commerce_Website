var productID;


function authenticate_admin(){
    var username=document.getElementById('admin_username_in').value;
    var password=document.getElementById('admin_password_in').value;
    console.log(username+'hello'+password);
    alert(username + " " + password);
    var authenticated=false;
    $.ajax({

        type: "POST",
         url: "./php/admin_authenticate.php",
         async: false,
         data: {admin_username_in:username,admin_password_in:password},
         success : function(response)
         {
           console.log(response);
             if(response){

                 //alert(response);
                 authenticated = true;
             }
             else
             {
                 alert("Username or Password incorrect");
             }

         }
});
if(authenticated){

    location.replace("admin.php");

}

}


function register_admin(){

  var fullName = document.getElementById('admin_fullName_in').value;
  var username=document.getElementById('admin_username_in').value;
  var password=document.getElementById('admin_password_in').value;
  var confirm_password=document.getElementById('admin_confirm_password_in').value;
  //var authenticated=false;
  $.ajax({

      type: "POST",
       url: "./php/staff_registration_process.php",
       async: false,
       data: {admin_fullName_in:fullName, admin_username_in:username, admin_password_in:password, admin_confirm_password_in:confirm_password},
       success : function(response)
       {
           if(response){
               swal(response);
               //alert(response);
               //authenticated = true;
           }
           else
           {
               alert("Username or Password incorrect");
           }

       }
});

}

/*function add_product(){
	var name=document.getElementById("input_product_name").value;
	var price=document.getElementById("input_price").value;
    var description=document.getElementById("input_description").value;
    var image_url = document.getElementById("image_url").value;
    alert(image_url);
	$.ajax({

                type: "POST",
                 url: "php/product_add.php",
                 async: false,
                 data: {name:name,price:price,description:description,image_url:image_url},
                 success : function(text)
                 {
                     status = text;
                     alert(status);

                 }
      });

}*/

function edit_product($productID,$productName,$productPrice,$productDescription){

	document.getElementById("edit_branch_area").style.display="block";
	document.getElementById("product_name").value=$productName;
	document.getElementById("product_price").value=$productPrice;
	document.getElementById("product_description").value=$productDescription;
	productID=$productID;
}

function update_product(){

	var new_name=document.getElementById("product_name").value;
	var new_price=document.getElementById("product_price").value;
	var new_description=document.getElementById("product_description").value;
	$.ajax({

                type: "POST",
                 url: "php/product_update.php",
                 async: false,
                 data: {productID:productID,name:new_name,price:new_price,description:new_description},
                 success : function(text)
                 {
                     status = text;

                 }
      });

	alert(status);
	location.reload();




}

function changeOrderStatusTo($newStatus, $id){
  var newStatus = $newStatus;
  var id = $id;
  $.ajax({

                type: "POST",
                 url: "php/changeOrderStatus.php",
                 async: false,
                 data: {newStatus:newStatus, id:id},
                 success : function(text)
                 {
                     status = text;

                 }
      });

	//alert(status);
	location.reload();
}


function changeDeliveryStatusTo($newStatus, $id){
  var newStatus = $newStatus;
  var id = $id;
  $.ajax({

                type: "POST",
                 url: "php/changeDeliveryStatus.php",
                 async: false,
                 data: {newStatus:newStatus, id:id},
                 success : function(text)
                 {
                     status = text;

                 }
      });

	//alert(status);
	location.reload();
}


function remove_product($productID){
	swal({
		title: "Are you sure?",
		text: "Once deleted, you will not be able to recover this information!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({

                type: "POST",
                 url: "php/product_remove.php",
                 async: false,
                 data: {productID:$productID},
                 success : function(text)
                 {
                     status = text;
                     swal("This product has been deleted!", {
						icon: "success",
					 });
					 location.reload();

                 }
      });



		}
	});


}


$(function() {

    $.ajax({

        type: "GET",
         url: "php/top_sales.php",
         success : function(text)
         {
             status = text;
             Morris.Donut({
                element: 'morris-donut-chart',
                data: JSON.parse(text),
                resize: true
            });
            //console.log(text);

         }
});
});
$(function() {


    $.ajax({

        type: "GET",
         url: "php/subscribeStatus.php",
         success : function(text)
         {
             var array=JSON.parse(text);
             var data=[];
             for (var i = 0; i < array.length; i++) {
                  //console.log(new Date(array[i].date));
                  var subscribers=parseInt(array[i].subscribers);
                  var date=new Date(array[i].date);
                  var month=date.getMonth();
                  //console.log(typeof(date/));
                  data.push({subscribers:subscribers,date:month});
                  //console.log(data);
             }

             Morris.Area({
                 element: 'morris-area-chart',
                 data: array,
                 xkey: 'date',
                 ykeys: ['subscribers'],
                 labels: ['subscribers'],
                 pointSize: 3,
                 hideHover: 'auto',
                 resize: true
             });


            //console.log( JSON.parse(text));

         }
});
});


/*$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            subscribers: 3,
            month: 2018/08/09,

        }, {
            subscribers: 4,
            month: 2018/09/09,

        }, {
          subscribers: 8,
          month: 2018/10/09,

        }, {
          subscribers: 7,
          month: 2018/10/15,

        }],
        xkey: 'month',
        ykeys: ['subscribers'],
        labels: ['subscribers'],
        pointSize: 3,
        hideHover: 'auto',
        resize: true
    });


});
*/
