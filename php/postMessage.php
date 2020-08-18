<?php
  include 'sql_connect.php';
  $message = $_POST['message'];
  $email = $_POST['email'];
  $sql="INSERT INTO message (message, email) values('$message', '$email')";
  $result=mysqli_query($conn,$sql);
  if($result){
    echo true;
  }
  else {
    echo false;
  }
?>
