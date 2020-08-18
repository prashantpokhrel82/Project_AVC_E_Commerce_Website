<?php
include('./php/sql_connect.php');

print_r($_POST);
$email_error = $password_error = "";
$email = $password = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
  $salt = '$5$rounds=5000$blaster$';
  if (empty($_POST["email"])) {
    $email_error = " * Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  if (empty($_POST["password"])) {
    $password_error = "* Password is required";
  } else {
    $password = test_input($_POST["password"]);
    $hashed_password = crypt($password, $salt);
  }


  if (!empty($_POST["email"]) && !empty($_POST["password"])) {


    $sql = "SELECT * from customer where email = '$email' and password = '$hashed_password';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $f_name = $row['f_name'];
            $l_name = $row['l_name'];
            $email = $row['email'];
            $address_id = $row['address_id'];
            $card_number = $row['card_number'];
            $id=$row['id'];


            echo "Successfully logged in";
            session_start();
            echo "Session started ";
            $_SESSION["username"]=$email;
            $_SESSION["name"]=$f_name." ".$l_name;
            $_SESSION["customerID"]=$id;
            print_r($_SESSION);
            header('Location: index.php');


            exit;

        }
    } else {
        echo "Wrong password. Please try again!";
    }





  }





}
?>
