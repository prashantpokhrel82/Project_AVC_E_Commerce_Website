<?php
  session_start();
 ?>
<!DOCTYPE html>
<?php

include('./php/sql_connect.php');
include('./php/userFunctions.php');
include('./php/user_info_update_validate.php');
?>
<html lang="en">
<head>
  <title>AVC - Update Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="./script/sessionScript.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="carde-top">
    <div class="logo">
      <img src="./img/honenew.png" class="img-fluid" style="width:120px;">
    </div>
    <nav class="navbar navbar-expand-sm navbar-light" id="main-nav">
      <div class="navbar-brand"><h4 id="sessionUsername">
      <?php

          if((!isset($_SESSION['username']))||($_SESSION['username']==''))
          {
            echo "";
          }
          else
          {
            echo   $_SESSION["name"];
          }
      ?>

       </h4></div>
      <a class="navbar-brand" href="#">AUSTRALIAN Vintage Clothing</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <li class="nav-item noSessionElement">
            <a class="nav-link" href="sign_up.php" id="signup">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shopping_cart.php">Shopping Cart</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="view_item.php">View Item</a>
          </li>

          <li class="nav-item noSessionElement">
            <a class="nav-link" href="login.php">Login</a>
          </li>

          <li class="nav-item sessionElement">
            <a class="nav-link" href="php/logout.php">Logout</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="privacy_policy.php">Privacy Policy</a>
          </li>
        </ul>
      </div>
    </nav>

  </div>

  <div class="row">
    <?php
    if((!isset($_SESSION['username']))||($_SESSION['username']=='')){
      echo'<div class="col-12">';
      echo "<h3 align='center'>Please Login for updating the account details.<br /><br />";
      echo "<a href='login.php' class='btn btn-secondary' role='button'>Redirect to Login Page</a>";
      echo "</div>";
    }
    else{
    ?>

    <div class="col-sm-12 col-md-6 col-lg-4">
      <h4> Personal Information</h4>
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
          <input type="text" class="form-control" id="gender" value="<?php echo getUserGender();?>" name="gender">
          <span class="error"><?php echo $gender_error ?></span>
        </div>






    </div>

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
      <h4>Address</h4>

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
    </div>



    <div class="col-sm-12 col-md-6 col-lg-4">
      <?php
      if((!isset($_SESSION['username']))||($_SESSION['username']=='')){
        echo "";
      }
      else{
      ?>
      <h4>Card Details</h4>

        <div class="form-group">
    		  <label for="card_number">Card Number</label>
    		  <input type="number"  class="form-control" id="card_number" value="<?php echo getCardNumber();?>" name="card_number">
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
