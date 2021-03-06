
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

            <li class="nav-item sessionElement active">
              <a class="nav-link" href="favourite_item.php"><i class="fas fa-heart"></i> Favorites</a>
            </li>

            <li class="nav-item dropdown sessionElement">
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
        <h3 class="text-center display-4">Favorite Items</h3>
        <hr class="my-4">

        <div class="row" id="list-item-section">
          <?php
              $user_id = getUserId();
              $sql = "SELECT I.image_url, I.name, I.price, I.description, I.id, C.id as CID from favourites F, customer C, item I where C.id = F.customer_id and I.id = F.item_id and  C.id = '$customerID'";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                for($loop = 0; $loop < mysqli_num_rows($result); $loop++){
                  $row = mysqli_fetch_assoc($result);
                  $item_name = $row['name'];
                  $item_price = $row['price'];
                  $item_description = $row['description'];
                  $out_des = strlen($item_description) > 100 ? substr($item_description,0,100)."..." : $item_description;
                  $itemID=$row['id'];
                  $image_url = $row['image_url'];
                  ?><div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card jumbotron" id="jumbo">
                      <img src="./img/item_img/<?php echo $image_url ?>" class="img-fluid img-thumbnail display-img">
                      <p class="card-header"><span class="font-weight-bold">Name</span><?php echo $item_name;?></p>
                      <p class="card-body"><span class="font-weight-bold">Price</span><?php echo $item_price?><br />
                      <span class="font-weight-bold">Description</span><?php echo $out_des?></p>

                      <?php
                        if(isset($_SESSION["username"]))
                        {

                      ?>
                      <button class="btn btn-secondary btn-sm card-body addItem" onclick="saveToCart(<?php echo $itemID?>,<?php echo $customerID?>)">Add To Cart</button><br />
                      <button class="btn btn-default btn-sm card-body addItem" onclick="removeItemFromFavorite(<?php echo $itemID?>,<?php echo $customerID?>)">Remove from Favorite</button>

                      <?php

                        }
                        else
                        {
                      ?>
                      <button class="btn btn-secondary btn-sm card-body addItem" onclick="saveToCart(<?php echo $itemID?>,<?php echo $customerID?>)">Add To Cart</button><br />
                      <button class="btn btn-secondary btn-sm card-body addItem" onclick="removeItemFromFavorite(0,0)">Remove from Favorite</button>


                      <?php

                        }
                      ?>



                    </div>
                  </div>
                  <?php
                }
              }
              else{
                ?>
                <div class="col-12">
                  <div class="jumbotron">
                  <center> <h3 class='text-info'>Favorite List is Empty</h3></center>
                  </div>
                </div>
                <?php
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
