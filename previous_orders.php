
<!DOCTYPE html>
<?php

  include('./php/sql_connect.php');
  include('./php/userFunctions.php');
  session_start();
  //var_dump($_SESSION);
  if (isset($_SESSION["username"]))
    $customerID=$_SESSION["customerID"];
?>


<html lang="en">
<head>
  <title>AVC- View Items</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/style.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="./script/sessionScript.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <style>
  #jumbo{
    padding: 10px;
    margin: 5px;
  }
  </style>

</head>
<body>
<div class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="./img/honenew.png" class="img-fluid" style="width:120px;" />

        </a>
        <div class="navbar navbar-expand-sm navbar-light" id="main-nav">
          <p class="lead" style="color:#f57900; font-weight:bold;">AUS VINTAGE CLOTHING</p>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav nav ml-auto">
            <li class="nav-item">
              <p id="sessionUsername" style="color: #fff; padding-top:8px; padding-right: 10px;">
              <?php
                  if(isUserLoggedIn()){
                    echo "G'day ".getUserFirstName();
                  }
              ?>

              </p>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php"><i class="fas fa-home"></i></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="shopping_cart.php"><i class="fas fa-shopping-cart"></i> Cart</a>
            </li>

  		      <li class="nav-item">
              <a class="nav-link" href="view_item.php">View Item</a>
            </li>

            <li class="nav-item sessionElement">
              <a class="nav-link" href="favourite_item.php"><i class="fas fa-heart"></i> Favorites</a>
            </li>

            <li class="nav-item dropdown sessionElement active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Orders
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item sessionElement" href="pending_orders.php">Pending Orders</a>
                <a class="dropdown-item sessionElement" href="previous_orders.php">Previous Orders</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item noSessionElement" href="login.php">Login</a>
                <a class="dropdown-item sessionElement" href="php/logout.php">Logout</a>
                <a class="dropdown-item noSessionElement" href="sign_up.php">Create Account</a>
                <a class="dropdown-item sessionElement" href="updatePassword.php">Update Password</a>
                <a class="dropdown-item sessionElement" href="updatePersonalDetails.php">Update Profile</a>
                <a class="dropdown-item sessionElement" href="billing_address.php">Add/Edit Billing Address</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>






  <div class="container-fluid">
    <div class="col-12">
      <div class="jumbotron">
        <h3 class="text-center display-4"> Previous Orders</h3>
        <hr class="my-4">
        <div class="row" id="list-item-section">
          <?php
          $customerID = $_SESSION["customerID"];
              $sql = "SELECT I.image_url, I.id as IId, I.name, I.price, P.id as PId, P.d_status, P.customer_id, P.item_id, P.quantity, P.receipt_number, P.status from item I, pending_order P WHERE I.id = P.item_id AND P.status='APPROVED' AND P.customer_id = '$customerID' order by P.item_id desc;";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                for($loop = 0; $loop < mysqli_num_rows($result); $loop++){
                  $row = mysqli_fetch_assoc($result);
                  $item_name = $row['name'];
                  $item_price = $row['price'];
                  $quantity = $row['quantity'];
                  $total_price = $row['price'] * $row['quantity'];
                  $receipt_number = $row['receipt_number'];
                  $status = $row['status'];
                  $itemID=$row['IId'];
                  $approved_id = $row['PId'];
                  $d_status=$row['d_status'];
                  $image_url = $row['image_url'];
                  ?><div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card jumbotron" id="jumbo">
                      <img src="./img/item_img/<?php echo $image_url ?>" class="img-fluid img-thumbnail display-img">
                      <p class="card-header">
                        <span class="font-weight-bold">Name: </span><?php echo $item_name; ?><br />
                        <span class="font-weight-bold">Price: </span><?php echo $item_price; ?><br />
                        <span class="font-weight-bold">Quantity: </span><?php echo $quantity; ?><br />
                        <span class="font-weight-bold">Total Price: </span><?php echo $total_price; ?><br />
                        <span class="font-weight-bold">Receipt Number: </span><?php echo $receipt_number; ?><br />
                        <span class="font-weight-bold">Status: </span><?php echo $status; ?><br />
                        <span class="font-weight-bold">Delivery Status: </span><?php echo $d_status; ?><br />
                        <!--<span class="font-weight-bold">Approved ID: </span><?php //echo $approved_id; ?><br />-->


                      </p>
                      <?php
                        if(isset($_SESSION["username"]))
                        {

                      ?>
                        <form method="POST" action = "deliveryStatus.php">
                          <button class="btn btn-info btn-md btn-block card-body" value="<?php echo $d_status?>" name="d_status" id = "d_status">Check Delivery Status</button>
                        </form>
                        <!--<button class="btn btn-secondary btn-sm card-body" onclick="saveToCart(<?php //echo $itemID?>,<?php //echo $customerID?>)">Check Delivery Status</button>-->
                        <?php
                        }
                        ?>
                    </div>
                  </div>
                  <?php
                }
              }
          ?>




        </div><!--close row-->
      </div><!--close jumbo-->
    </div><!--close col-->





  </div>

  <footer>
    <div class="site-map">
      <div class="row">
        <div class="col-lg-4">
          <div class="jumbotron">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="jumbotron">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="jumbotron">
          </div>
        </div>
      </div>
    </div>
    <p class="copyright">Copyright &copy; Australian Vintage Clothing</p>
  </footer>
</div>












<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script/script.js">
/*
  $(document).ready(function(){
    $(".addItem").click(function(){
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

          var itemID=<?php echo $itemID?>;
          var customerID=<?php echo $customerID?>;
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

          alert(status);





      }
      else{
        alert("no active session.Please Login.");

      }
    });


  });
*/
</script>

</body>
</html>
