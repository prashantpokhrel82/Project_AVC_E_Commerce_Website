<?php
include('sql_connect.php');
if(isset($_POST)){
    $email = $_POST['email'];
}

//echo $email;


$sql = "SELECT email from subscribe where email = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "Subscription already added";
    // output data of each row

} else {
  $stmt = $conn->prepare("INSERT INTO subscribe(email, time_stamp) values(?, CURRENT_DATE)");
  $stmt->bind_param("s", $email);
  if($stmt->execute()){
    echo "Subscription successfully added";
  }

}

?>
