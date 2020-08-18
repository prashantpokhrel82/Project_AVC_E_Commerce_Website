<!DOCTYPE html>
<?php
  include('./php/quote_validate.php');
  include('./php/sql_connect.php');
  include('./php/userFunctions.php');

  session_start();
  //print_r($_SESSION);
  //var_dump($_SESSION);

$delivery_status = "APPROVED";
  if ($_POST)
  {
    $delivery_status = $_POST['d_status'];
  }
  else
  	echo "Error! Unsuccessful to identify the status of the item.";


?>


<html lang="en">
<head>
  <title>Australian Vintage Clothing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/style.css" >


  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/fontawesome-all.min.js"></script>

  <script src="./script/script.js"></script>
  <script src="./script/sessionScript.js"></script>




  <script>
  function getSearchName(){
    var input = document.getElementById('searchName').value;
    alert(input);
    return input;
  }
  function opena(){
    window.open("searchItem.php");
  }
  </script>

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
            <li class="nav-item active">
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



  <div class="jumbotron">
    <h3 class="display-4 text-center">Delivery Status</h3>
    <hr class="my-4">
    <div class="container">
      <div class="jumbotron">
        <ul class="progressbar">
            <li class="<?php if($delivery_status == 'PAYMENT_CONFIRMATION' || $delivery_status == 'PENDING'){echo 'active';}?>" id="payment_confirmation_progress">Payment Confirmation</li>
            <li class="<?php if($delivery_status == 'SHIPPED'){echo 'active';}?>" id="shipped_progress">Shipped</li>
            <li class="<?php if($delivery_status == 'IN_TRANSIT'){echo 'active';}?>" id="in_transit_progress">In transit</li>
            <li class="<?php if($delivery_status == 'DELIVERED'){echo 'active';}?>" id="delivered_progress">Delivered</li>
        </ul>
      </div><!--close jumbo-->
    </div><!--close container-->
  </div><!--close jumbo-->



  <footer>
    <div class="container">
            <hr class="my-4">
            <div class="row ">
                <!-- footer-about -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                    <div class="footer-widget ">
                        <div class="footer-title">Company</div>
                        <ul class="list-unstyled">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="privacy_policy.php">Legal & Privacy</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.footer-about -->
                <!-- footer-links -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                    <div class="footer-widget ">
                        <div class="footer-title">Quick Links</div>
                        <ul class="list-unstyled">
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.footer-links -->
                <!-- footer-links -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                    <div class="footer-widget ">
                        <div class="footer-title">Social</div>
                        <ul class="list-unstyled">
                            <li><a href="https://twitter.com/" target="_blank">Twitter</a></li>
                            <li><a href="https://plus.google.com/" target="_blank">Google +</a></li>
                            <li><a href="https://linkedin.com/" target="_blank">Linked In</a></li>
                            <li><a href="https://facebook.com/" target="_blank">Facebook</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.footer-links -->
                <!-- footer-links -->
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-6 col-6 ">
                    <div class="footer-widget ">
                        <h3 class="footer-title">Subscribe Newsletter</h3>
                        <form>
                            <div class="newsletter-form">
                              <input type="email" required='required' class="form-control" placeholder="Please Enter an email" id="subscription_email"><br />
                              <button class="btn btn-default btn-sm" onclick="subscribe()">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.footer-links -->
                <!-- tiny-footer -->
            </div>
            <div class="row ">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
                    <hr class="my-4">
                    <div class="tiny-footer">
                        <p>Copyright &copy; Australian Vintage Clothing</p>
                    </div>
                </div>
                <!-- /. tiny-footer -->
            </div>
        </div>

  </footer>
</div>



</body>


</html>
