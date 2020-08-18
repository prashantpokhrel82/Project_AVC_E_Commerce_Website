<?php
  session_start();
 ?>
<!DOCTYPE html>
<?php

include('./php/sql_connect.php');
include('./php/userFunctions.php');
include('./php/addBillingAddress.php');
//include('./php/user_info_update_validate.php');
?>
<html lang="en">
<head>
  <title>AVC - Update Details</title>
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

            <li class="nav-item">
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

            <li class="nav-item dropdown active">
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


  <div class="row justify-content-md-center">


    <div class="col-sm-12 col-md-6 col-lg-6">
      <?php
      if((!isset($_SESSION['username']))||($_SESSION['username']=='')){
        echo'<div class="col-12">';
        echo "<h3 align='center'>Please Login for updating the account details.<br /><br />";
        echo "<a href='login.php' class='btn btn-secondary' role='button'>Redirect to Login Page</a>";
        echo "</div>";
      }
      else{
      ?>
      <div class="jumbotron">
        <h4>Change/ Add Billing Address</h4>
        <h5 class="text-warning">Changing this address will change your original address.</h5>
        <div class='form'>
          <form method = "POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
          <div class="form-group">
            <label for="address_line">Please Enter the billing address</label>
            <input type="text"  class="form-control" required='required' id="address_line" value="<?php echo getUserAddressLine();?>" name="address_line">
            <!--<span class="error"><?php //echo $address_line_error ?></span>-->
          </div>

          <div class="form-group">
            <label for="street">Street</label>
            <input type="text" class="form-control" required='required' id="street" value="<?php echo getUserStreet();?>" name="street">
            <!--<span class="error"><?php //echo $street_error ?></span>-->
          </div>

          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" required='required' id="city" value="<?php echo getUserCity();?>" name="city">
            <!--<span class="error"><?php //echo $city_error ?></span>-->
          </div>

          <div class="form-group">
            <label for="post_code">Post Code</label>
            <input type="number" class="form-control" required='required' id="post_code" value="<?php echo getUserPostCode();?>" name="post_code">
            <!--<span class="error"><?php //echo $post_code_error ?></span>-->
          </div>

          <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" required='required' id="state" value="<?php echo getUserState();?>" name="state">
            <!--<span class="error"><?php //echo $state_error ?></span>-->
          </div>

          <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" required='required' id="country" value="<?php echo getUserCountry();?>" name="country">
            <!--<span class="error"><?php //echo $country_error ?></span>-->
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-secondary btn-block" value="Submit" id="change">
          </div>

          </form>

        </div>
      </div><!--close jumbo-->



      <?php
      }
      ?>
    </div>



  </div><!--close row-->

  <div class="row">
    <?php
    if(!((!isset($_SESSION['username']))||($_SESSION['username']==''))){
    ?>
    <div class="col-sm-12 col-md-12 col-lg-12">

    </div>
    <?php } ?>
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
