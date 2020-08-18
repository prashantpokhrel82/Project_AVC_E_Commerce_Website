<?php
  session_start();
  include './php/sql_connect.php';
  include './php/userFunctions.php';
  include './php/paymentCheck.php';
  $receipt_details="";
//  echo isset($_POST['receipt_number']);
  if(isset($_POST['receipt_number'])){
    $receipt_details = "Your order has been placed. You will receive an order confirmation email once the sales team verify your transaction.";
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checkout</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/style.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./script/sessionScript.js"></script>
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

            <li class="nav-item active">
              <a class="nav-link" href="shopping_cart.php"><i class="fas fa-shopping-cart"></i> Cart</a>
            </li>

  		      <li class="nav-item">
              <a class="nav-link" href="view_item.php">View Item</a>
            </li>

            <li class="nav-item sessionElement">
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


  <div class="row">

      <?php
          if(isUserLoggedIn()){
          //echo getGrandTotalPrice();
          ?>

          <div class="col-12">

            <div class="jumbotron">
              <h3 class="text-center display-4"> Select Payment Method </h3>
              <hr class="my-4">
              <div class="row">
                <div class="col-4">
                  <ul class="list-inline">
                    <li><a class="btn" data-toggle="collapse" data-target="#paypalSelect"><img src="./img/paypal.png" class="img-thumbnail" style="height: 100px; width:300px;"/></a></li>
                    <li><a class="btn" data-toggle="collapse" data-target="#masterCardSelect"><img src="./img/visa-master.png" class="img-thumbnail" style="height: 100px; width:300px;" /></a> </li>
                  </ul>
                </div>
                <div class="col-8">
                  <div id="paypalSelect" class="collapse">
                    <?php

                    if($receipt_details==""){
                    ?>
                    <h4>Please sign in to the paypal and pay <span class="text-info">$ <?php echo getGrandTotalPrice(); ?></span> to 'ausvintageclothing@gmail.com'</h4>
                    <a href="https://www.paypal.com/signin" target="_blank" class="btn btn-block btn-info">Open Paypal</a><br />
                    <div class="form-group">
                      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" >
                        <input type="text" class="form-control" required = "required" placeholder="Enter the receipt number." id="receipt_number" name="receipt_number" />
                        <button class="btn btn-secondary btn-block form-control">Submit</button>
                      </form>
                    </div>
                    <?php
                    }else{
                      echo "<h3>$receipt_details</h3>";
                      echo"<script>alert('$receipt_details')</script>";
                    }
                    ?>

                  </div>
                  <div id="masterCardSelect" class="collapse">
                    <?php

                    if($receipt_details==""){
                    ?>

                    <h4>Card Details</h4>
                      <form action = "<?php echo $_SERVER['PHP_SELF']?>" method = 'POST'>
                        <div class="form-group">
                          <label for="card_number">Card Number</label>
                          <input type="number"  class="form-control" required = "required" id="card_number" value="<?php echo getCardNumber();?>" name="card_number">
                          <!--<span class="error"><?php// echo $card_number_error ?></span>-->
                        </div>

                        <div class="form-group">
                          <label for="name_on_card">Name on Card</label>
                          <input type="text" class="form-control" required = "required" id="name_on_card" value="<?php echo getCardName();?>" name="name_on_card">
                          <!--<span class="error"><?php //echo $name_on_card_error ?></span>-->
                        </div>

                        <div class="form-group">
                          <label for="expiry_date">Expiry Date</label>
                          <input type="date" class="form-control" required = "required" id="expiry_date" value="<?php echo getCardExpiryDate();?>" name="expiry_date">

                          <!--<span class="error"><?php //echo $expiry_date_error ?></span>-->
                        </div>

                        <div class="form-group">
                          <label for="cvv_number">CVV</label>
                          <input type="number" class="form-control" id="cvv_number" name="cvv_number" required="required" max="9999">

                          <!--<span class="error"><?php //echo $expiry_date_error ?></span>-->
                        </div>

                        <button class="btn btn-secondary btn-block">Submit</button>
                      </form>

                    <?php
                    }else{
                      echo "<h3>$receipt_details</h3>";
                      //echo"<script>alert('$receipt_details')</script>";
                    }
                    ?>
                  </div>
                </div>
              </div> <!--close row-->
            </div><!--close jumbotron-->
          </div><!--close column-->

          <?php
          }
          else {
            {
              echo '<div class="col">';
              echo '<h3 class="text-center">Please login to begin.</h3>';
              echo '</div>';
            }
          }



      ?>

    </div>
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

</body>
</html>
