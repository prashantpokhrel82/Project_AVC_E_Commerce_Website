<?php
  session_start();
 ?>
<!DOCTYPE html>
<?php
//include('./php/sign_up_validate.php');
include('./php/sql_connect.php');
include('./php/userFunctions.php');
?>
<html lang="en">
<head>
  <title>AVC- Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/style.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="./script/sessionScript.js"></script>
  <script src="./script/script.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
        <div class="jumbotron">


	  <h2>SignUp Form</h2>
	  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
		<div class="form-group">
		  <label for="email">First Name:</label>
		  <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" required>
      <span class="error"><?php //echo $first_name_error; ?></span>
		</div>
		<div class="form-group">
		  <label for="text">Last Name:</label>
		  <input type="text" class="form-control" id="last_name" placeholder="Enter Last name" name="last_name" required>
      <span class="error"><?php //echo $last_name_error; ?></span>
		</div>
		<div class="form-group">
		  <label for="email">Email:</label>
		  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      <span class="error"><?php //echo $email_error; ?></span>
		</div>
		<div class="form-group">
		  <label for="pwd">Password:</label>
		  <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
      <span class="error"><?php //echo $password_error; ?> </span>
		</div>
		<div class="form-group">
		  <label for="email">Mobile Number:</label>
		  <input type="text" class="form-control" id="mobile" placeholder="Enter mobile number" name="mobile" required>
      <span class="error"><?php //echo $mobile_error ?> </span>
		</div>
		<div class="form-group">
		  <label for="Gender">Gender</label>
		 </div>

		<div class="radio">
		  <label>Male</label>
      <input type="radio" name="gender"
      <?php if (isset($gender) && $gender=="male") echo "checked";?>
      value="male">

      <label>Female</label>
      <input type="radio" name="gender"
      <?php if (isset($gender) && $gender=="female") echo "checked";?>
      value="female">
      <span class="error"><?php //echo $gender_error ?> </span>
		</div>
		<a class="btn btn-secondary btn-block" onClick="signUpValidate()">SignUp</a>
	  </form>



      </div><!--close jumbo-->
    </div><!--close col-->
  </div><!--close row-->



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
