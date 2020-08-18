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

  <div class="middle-section">
            <div id="custom-search-input">
                <div class="input-group col-12">
                  <form class="form-inline"action="searchItem.php" method="POST">
                    <input type="text" class="form-control input-lg" required = "required" placeholder="Search" id="key" name="key"/>
                    <button class="btn btn-info btn-lg input-group-btn" type="submit">
                          <i class="fa fa-search"></i>
                    </button>
                  </form>
                </div>
            </div>


    <div class="row">

      <div class="col-lg-3" id="categories-list">
        <h4><span class="si-glyph-bullet-list-2"></span>Categories</h4>
        <ul class="list-group bg-light">
          <li class="list-group-item">Jackets</li>
          <li class="list-group-item">Pants</li>
          <li class="list-group-item">Shirts</li>
          <li class="list-group-item">Footwear</li>
          <li class="list-group-item">Gloves</li>
          <li class="list-group-item">Trousers</li>
        </ul>
        <br />
        <input type="submit" class="btn btn-block btn-sm btn-dark" value="See More Categories">
      </div>

      <div id="demo" class="col-lg-6 carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="img-fluid" src="./img/img_slide1.jpg" alt="Stock Clothing" >
          </div>
          <div class="carousel-item">
            <img class="img-fluid" src="./img/img_slide2.jpg" alt="Collection" >
          </div>
          <div class="carousel-item">
            <img class="img-fluid" src="./img/img_slide3.jpg" alt="Brands" >
          </div>
        </div><!--close carosel-->

        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>

      </div><!--close col-->

      <div class="col-lg-3 float-right quote-form">

          <h4><span class="highlight">Request Quote</span></h4>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" id="quote-product" placeholder="What are you looking for..." name="quote-product">
              <span class="error"><?php echo $product_error; ?></span>

            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="quote-product-number" placeholder="Quantity" name="quote-product-number">
              <span class="error"><?php echo $product_number_error; ?></span>
            </div>

            <div class="form-group">
              <input type="email" class="form-control" id="email" placeholder="Enter Email Address" name="email">
              <span class="error"><?php echo $email_error; ?></span>

            </div>

            <input type="submit" class="btn btn-block btn-sm btn-dark" value="Request for Quotation">
          </form>

      </div><!--close col-->
    </div><!--close row-->
  </div><!--close middle-section-->




  <div class="showcase">
    <img src="./img/showcase2.jpg" class="img-fluid">
    <div class="centered">
      <h1>AVC Jacket Clothing</h1>
      <button class="btn btn-light">Order Jacket</button>
    </div>
  </div>
  <hr class="my-4">
  <h3 class="text-center display-4">Latest Items</h3>
  <hr class="my-4">

  <div class="container-fluid">
    <div class="row" id="list-item-section">
      <?php
          $sql = "SELECT * from item  ORDER BY id desc limit 4;";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            for($loop = 0; $loop < mysqli_num_rows($result); $loop++){
              $row = mysqli_fetch_assoc($result);
              $item_name = $row['name'];
              $item_price = $row['price'];
              $item_description = $row['description'];
              $image_url = $row['image_url'];
              $out_des = strlen($item_description) > 100 ? substr($item_description,0,100)."..." : $item_description;
              $itemID=$row['id'];

              ?>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card jumbotron" id="jumbo">
                  <img src="./img/item_img/<?php echo $image_url ?>" class="img-fluid img-thumbnail display-img">
                  <p class="card-header"><span class="font-weight-bold">Name </span><?php echo $item_name;?></p>
                  <p class="card-body"><span class="font-weight-bold">Price </span><?php echo $item_price?><br />
                  <span class="font-weight-bold">Description: </span><?php echo $out_des?></p>

                  <?php
                    if(isset($_SESSION["username"]))
                    {
                      $customerID=$_SESSION["customerID"];
                  ?>
                  <button class="btn btn-secondary btn-sm card-body addItem" onclick="saveToCart(<?php echo $itemID?>,<?php echo $customerID?>)">Add To Cart</button><br />
                  <button class="btn btn-default btn-sm card-body addItem" onclick="saveToFavorite(<?php echo $itemID?>,<?php echo $customerID?>)">Add To Favorite</button>

              <?php
            }
            ?>
                </div>
              </div>
            <?php
          }
        }
      ?>
    </div><!--close list item section-->

    <hr class="my-4">


    <div class="showcase">
      <img src="./img/showcase.jpg" class="img-fluid">
    </div>

    <hr class="my-4">
    <h3 class="text-center display-4">Under 50 dollars</h3>
    <hr class="my-4">

    <div class="row" id="list-item-section">
      <?php
          $sql = "SELECT * from item  WHERE price<=50 limit 4;";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            for($loop = 0; $loop < mysqli_num_rows($result); $loop++){
              $row = mysqli_fetch_assoc($result);
              $item_name = $row['name'];
              $item_price = $row['price'];
              $item_description = $row['description'];
              $image_url = $row['image_url'];
              $out_des = strlen($item_description) > 100 ? substr($item_description,0,100)."..." : $item_description;
              $itemID=$row['id'];

              ?>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card jumbotron" id="jumbo">
                  <img src="./img/item_img/<?php echo $image_url ?>" class="img-fluid img-thumbnail display-img">
                  <p class="card-header"><span class="font-weight-bold">Name </span><?php echo $item_name;?></p>
                  <p class="card-body"><span class="font-weight-bold">Price </span><?php echo $item_price?><br />
                  <span class="font-weight-bold">Description: </span><?php echo $out_des?></p>

                  <?php
                    if(isset($_SESSION["username"]))
                    {
                      $customerID=$_SESSION["customerID"];
                  ?>
                  <button class="btn btn-secondary btn-sm card-body addItem" onclick="saveToCart(<?php echo $itemID?>,<?php echo $customerID?>)">Add To Cart</button><br />
                  <button class="btn btn-default btn-sm card-body addItem" onclick="saveToFavorite(<?php echo $itemID?>,<?php echo $customerID?>)">Add To Favorite</button>
                
              <?php
            }
            ?>
                </div>
              </div>
            <?php
          }
        }
      ?>
    </div><!--close list-item-section-->
  </div>



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
