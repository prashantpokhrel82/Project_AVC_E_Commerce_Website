<!DOCTYPE html>
<?php
  include('./php/quote_validate.php');
  include('./php/sql_connect.php');
  include('./php/userFunctions.php');

  session_start();
  //print_r($_SESSION);
  //var_dump($_SESSION);

?>


<html lang="en">
<head>
  <title>Australian Vintage Clothing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/style.css" >

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="./script/script.js"></script>
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
  <h1 class="display-4">Privacy Policy</h1>
  <hr class="my-4">
  <p class="text-justify">This privacy policy sets out how AUSTRALIAN VINTAGE CLOTHING uses and protects any information that you give AUSTRALIAN VINTAGE CLOTHING when you use this website.<br />
    &ldquo;[AUSTRALIAN VINTAGE CLOTHING]&rdquo; is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement.<br />
    &ldquo;[AUSTRALIAN VINTAGE CLOTHING]&rdquo; may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes. This policy is effective from [date].<br />
    <br />
    <hr class="my-4">
    <strong>What we collect</strong>&nbsp;<br />
    We may collect the following information:</p>
  <ul>
    <li>name and job title</li>
    <li>contact information including email address</li>
    <li>demographic information such as postcode, preferences and interests</li>
    <li>other information relevant to customer surveys and/or offers</li>
  </ul>
  <hr class="my-4">
  <p class="text-justify"><strong>What we do with the information we gather</strong><br />
    We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:</p>
  <ul>
    <li>Internal record keeping.</li>
    <li>We may use the information to improve our products and services.</li>
    <li>We may periodically send promotional email about new products, special offers or other information which we think you may find interesting using the email address which you have provided.&nbsp;</li>
    <li>From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone, fax or mail.</li>
    <li>We may use the information to customize the website according to your interests.</li>
    <li>We may provide your information to our third party partners for marketing or promotional purposes.</li>
    <li>We will never sell your information.</li>
  </ul>
  <hr class="my-4">
  <p class="text-justify"><strong>Security</strong>&nbsp;<br />
    We are committed to ensuring that your information is secure. In order to prevent unauthorized access or disclosure we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.</p>
    <hr class="my-4">
  <p class="text-justify"><strong>How we use cookies</strong>&nbsp;<br />
    A cookie is a small file which asks permission to be placed on your computer's hard drive. Once you agree, the file is added and the cookie helps analyze web traffic or lets you know when you visit a particular site. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences.&nbsp;<br />
    <br />
    We use traffic log cookies to identify which pages are being used. This helps us analyze data about web page traffic and improve our website in order to tailor it to customer needs. We only use this information for statistical analysis purposes and then the data is removed from the system.&nbsp;<br />
    <br />
    Overall, cookies help us provide you with a better website, by enabling us to monitor which pages you find useful and which you do not. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us.&nbsp;<br />
    <br />
    You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website.<br />
    <br />
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



</body>


</html>
