<?php

include('./sql_connect.php');
include('./userFunctions.php');
session_start();
//var_dump($_SESSION);
if (isset($_SESSION["username"]))
  $customerID=$_SESSION["customerID"];



	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		$notice = "Email can't be verified";
	} else {
		$email = $conn->real_escape_string($_GET['email']);
		$token = $conn->real_escape_string($_GET['token']);

    $sql = $conn->query("SELECT id FROM customer WHERE email='$email' AND token='$token' AND isEmailConfirmed=0");

    if ($sql->num_rows > 0) {
      $conn->query("UPDATE customer SET isEmailConfirmed=1, token='' WHERE email='$email'");
      $notice="Your email has been verified! You can log in now!";
    } else{
      $notice = "Email can't be verified";
    }

	}
?>



<!DOCTYPE html>

<html lang="en">
<head>
  <title>AVC- Confirm Email</title>
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




    <div class="col-12">
      <div class="jumbotron">
        <h3 class="text-center display-4"><?php echo $notice ?></h3>
        <center><a class="btn btn-info btn-lg" href="../login.php">Redirect To Login</a></center>
        <hr class="my-4">
      </div><!--close jumbo-->
    </div><!--close col-->

</div>












<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script/script.js">

</script>

</body>
</html>
