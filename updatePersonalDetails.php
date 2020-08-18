<?php
  session_start();
 ?>
<!DOCTYPE html>
<?php

include('./php/sql_connect.php');
include('./php/userFunctions.php');
include('./php/user_info_update_validate.php');

if (isset($_SESSION["username"]))
  $customerID=$_SESSION["customerID"];
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
  <script src="./script/script.js"></script>
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
  <div class="row">
    <?php
    if((!isset($_SESSION['username']))||($_SESSION['username']=='')){
      echo'<div class="col-12">';
      echo '<div class="jumbotron">';
      echo "<h3 align='center' class='display-4'>Please Login for updating the account details.<br /><br />";
      echo "<a href='login.php' class='btn btn-secondary' role='button'>Redirect to Login Page</a>";
      echo '</div>';
      echo "</div>";
    }
    else{
    ?>

    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="jumbotron">
      <h4 class="display-4"> Personal Details</h4>
      <form action = "<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST">
        <div class="form-group">
    		  <label for="f_name">First Name:</label>
    		  <input type="text"  class="form-control" id="f_name" value="<?php echo getUserFirstName();?>" name="f_name">
          <span class="error"><?php echo $f_name_error ?></span>
    		</div>

    		<div class="form-group">
    		  <label for="l_name">Last Name:</label>
    		  <input type="text" class="form-control" id="l_name" value="<?php echo getUserLastName();?>" name="l_name">
          <span class="error"><?php echo $l_name_error ?></span>
    		</div>

        <!--<div class="form-group">
    		  <label for="email">Email:</label>
    		  <input type="email" class="form-control" id="email" value="<?php echo getUserName();?>" name="email">
          <span class="error"><?php echo $email_error ?></span>
    		</div> -->

        <div class="form-group">
          <label for="mobile">Mobile:</label>
          <input type="number" class="form-control" id="mobile" value="<?php echo getUserMobile();?>" name="mobile">
          <span class="error"><?php echo $mobile_error ?></span>
        </div>

        <div class="form-group">
          <label for="gender">Gender:</label>
          <div class="radio">
            <label>Male</label>
            <input type="radio" name="gender"
            <?php if (isset($gender) && $gender=="male") echo "checked";?>
            value="male">

            <label>Female</label>
            <input type="radio" name="gender"
            <?php if (isset($gender) && $gender=="female") echo "checked";?>
            value="female">
            <span class="error"><?php echo $gender_error ?> </span>
          </div>
          <!--<input type="text" class="form-control" id="gender" value="<?php //echo getUserGender();?>" name="gender">
          <span class="error"><?php //echo $gender_error ?></span>-->
        </div>






    </div><!--close jumbo-->
  </div><!--close col-->

    <?php
    }
    ?>

    <div class="col-sm-12 col-md-6 col-lg-4">

      <?php
      if((!isset($_SESSION['username']))||($_SESSION['username']=='')){
        echo "";
      }
      else{
      ?>
      <div class="jumbotron">
      <h4 class="display-4">Address</h4>

        <div class="form-group">
    		  <label for="address_line">Address Line</label>
    		  <input type="text"  class="form-control" id="address_line" value="<?php echo getUserAddressLine();?>" name="address_line">
          <span class="error"><?php echo $address_line_error ?></span>
    		</div>

    		<div class="form-group">
    		  <label for="street">Street</label>
    		  <input type="text" class="form-control" id="street" value="<?php echo getUserStreet();?>" name="street">
          <span class="error"><?php echo $street_error ?></span>
    		</div>

        <div class="form-group">
    		  <label for="city">City</label>
    		  <input type="text" class="form-control" id="city" value="<?php echo getUserCity();?>" name="city">
          <span class="error"><?php echo $city_error ?></span>
    		</div>

        <div class="form-group">
          <label for="post_code">Post Code</label>
          <input type="number" class="form-control" id="post_code" value="<?php echo getUserPostCode();?>" name="post_code">
          <span class="error"><?php echo $post_code_error ?></span>
        </div>

        <div class="form-group">
          <label for="state">State</label>
          <input type="text" class="form-control" id="state" value="<?php echo getUserState();?>" name="state">
          <span class="error"><?php echo $state_error ?></span>
        </div>

        <div class="form-group">
          <label for="country">Country</label>
          <input type="text" class="form-control" id="country" value="<?php echo getUserCountry();?>" name="country">
          <span class="error"><?php echo $country_error ?></span>
        </div>



      <?php
      }
      ?>
    </div><!--close jumbo-->
    </div><!--close col-->


    <div class="col-sm-12 col-md-6 col-lg-4">

        <?php
        if((!isset($_SESSION['username']))||($_SESSION['username']=='')){
          echo "";
        }
        else{
        ?>
        <div class="jumbotron">
        <h4 class="display-4">Card Details</h4>

          <div class="form-group">
            <label for="card_number">Card Number</label>
            <input type="number" <?php if(!(getCardNumber() == null)) echo "disabled"?> class="form-control" id="card_number" value="<?php echo getCardNumber();?>" name="card_number">
            <span class="error"><?php echo $card_number_error ?></span>
          </div>

          <div class="form-group">
            <label for="name_on_card">Name on Card</label>
            <input type="text" class="form-control" id="name_on_card" value="<?php echo getCardName();?>" name="name_on_card">
            <span class="error"><?php echo $name_on_card_error ?></span>
          </div>

          <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" class="form-control" id="expiry_date" value="<?php echo getCardExpiryDate();?>" name="expiry_date">

            <span class="error"><?php echo $expiry_date_error ?></span>
          </div>
          <a class="btn btn-info btn-block text-warning"  onclick="removeCard(<?php echo $customerID; ?>)">Remove Card</a>




        <?php
        }
        ?>
      </div><!--close jumbo-->
    </div><!--close col-->





  </div><!--close row-->

  <div class="row">
    <?php
    if(!((!isset($_SESSION['username']))||($_SESSION['username']==''))){
    ?>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <input type="submit" class="btn btn-secondary btn-block" value="Change Personal Details" id="change">
      </form>
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
