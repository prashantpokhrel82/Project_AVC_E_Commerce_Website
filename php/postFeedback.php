<?php
  include 'sql_connect.php';
  $comments = $_POST['comments'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $experience = $_POST['rateValue'];
  $sql="INSERT INTO feedback(name, email, comment, experience) values('$name', '$email', '$comments', '$experience')";
  $result=mysqli_query($conn,$sql);
  if($result){
    echo true;
  }
  else {
    echo false;
  }
?>
