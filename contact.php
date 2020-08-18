<?php
  session_start();
  include('./php/userFunctions.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/style.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./script/sessionScript.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src = "./script/script.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjHlsnP4J3t2Ht7hm-1Y3mckXira4YN3E&callback=initMap"></script>
    <style>
    .form-container
     {
      background-color: #fff;

         box-shadow: 0 16px 24px 2px rgba(0,0,0,0.14), 0 20px 30px 5px rgba(0,0,0,0.12), 0 8px 10px -5px rgba(0,0,0,0.3);
         border-radius: 8px;
         font-family: 'Montserrat', Arial, Helvetica, sans-serif;
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

            <li class="nav-item active">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <!--start of feedback section-->
    <div class="jumbotron-fluid">
    <div class="row justify-content-md-center" style="margin-top: 50px">
        <!--location-->
        <div class="col-md-4 col-md-offset-3 form-container ">
            <div class="jumbotron-fluid justify-content-md-center" style="background-image: url('img/bg-01.jpg'); height: 100%;">
              <div class="jumbotron contact-body">
                <p class="h3 text-success">Australian Vintage Clothing</p>
                <div>
                  <p class="h4 bg-secondary">Address</p>
                  <p class="h5">15 Pegler Street, South Granville, NSW 2142</p><br /><br />
                </div>
                  <p class="h4 bg-secondary">Contact</p>
                  <p class="h5">+61 411002244</p><br /><br />
                <div>
                  <p class="h4 bg-secondary">Email</p>
                  <p class="h5"><a href="mailto:ausvintageclothing@gmail.com">ausvintageclothing@gmail.com</a></p><br /><br />
                </div>


              </div>

            </div>
        </div>
        <!--end locatin-->
        <div class="col-md-6 col-md-offset-3 form-container ">
            <h2 class="text-center display-4">Feedback</h2>
            <p class="text-center"> Please provide your feedback below: </p>
            <form action="#">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label>How do you rate your overall experience?</label>
                        <p>
                            <label class="radio-inline">
                                <input type="radio" name="experience" id="radio_experience" value="bad" >
                                Bad
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="experience" id="radio_experience" value="average" >
                                Average
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="experience" id="radio_experience" value="good" >
                                Good
                            </label>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="comments"> Comments:</label>
                        <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="name"> Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email"> Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <a class="btn btn-lg btn-warning btn-block" onClick="postFeedback()" >Post </a>
                    </div>
                </div>
            </form>
            <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
            <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
        </div>


    </div>
  </div><!--close jumbo-->
    <!--end of feedback section-->

    <div class="jumbotron">
      <div class="col-12">
        <div id="map"></div>
      </div>
    </div>
    <!--message admin-->
    <div class="jumbotron">
      <div class="col-12 form-container">

            <h2 class="text-center display-4">Message</h2>
            <form>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message"> Message:</label>
                        <textarea class="form-control" type="textarea" name="message-text" id="message-text" placeholder="Your Message Max(300)" maxlength="300" rows="7" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input type="email" class="form-control" id="message-email" name="message-email" placeholder="Enter your email address" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <a class="btn btn-md btn-warning" onClick = "postMessages()">Send Message </a>
                    </div>
                </div>

            </form>


      </div>
    </div><!--close jumbo-->
    <!--end of message-->



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






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>
</html>
