<?php
include('./php/sql_connect.php');
$msg = $email_error = $password_error = "";

//print_r($_POST);

/*function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



if($_SERVER["REQUEST_METHOD"] == "POST"){
  $salt = '$5$rounds00$blaster$';
  if (empty($_POST["email"])) {
    $email_error = " * Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  if (empty($_POST["password"])) {
    $password_error = "* Password is required";
  } else {
    $password = test_input($_POST["password"]);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
  }


  if (!empty($_POST["email"]) && !empty($_POST["password"])) {


    $sql = "SELECT * from customer where email = '$email' and password = '$hashed_password';";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 1) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $f_name = $row['f_name'];
            $l_name = $row['l_name'];
            $email = $row['email'];
            $address_id = $row['address_id'];
            $card_number = $row['card_number'];
            $id=$row['id'];
            $email_confirmation = $row['isEmailConfirmed'];

            if( $email_confirmation == 0){
              echo "Please Verify Your Email Address";
            }else{
              echo "Successfully logged in";
              session_start();
              echo "Session started ";
              $_SESSION["username"]=$email;
              $_SESSION["name"]=$f_name." ".$l_name;
              $_SESSION["customerID"]=$id;
              print_r($_SESSION);
              header('Location: index.php');

            }


            exit;

        }
    } else {
      print_r($data);
        echo "Wrong password. Please try again!";
    }





  }





}*/


if($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $conn->real_escape_string($_POST['email']);
  $password = $conn->real_escape_string($_POST['password']);

  if ($email == ""){
    $email_error = "Please Enter your email";
  }
  elseif ($password == "") {
    $password_error = "Please Enter your password";
  }
  else {
    $sql = $conn->query("SELECT * FROM customer WHERE email='$email'");
    if ($sql->num_rows > 0) {
              $data = $sql->fetch_array();
              $verify = password_verify($password, $data['password']);
              //if (password_verify($password, $data['password'])) {
              if ($verify) {
                  if ($data['isEmailConfirmed'] == 0)
                    $msg = "Please verify your email!";
                  else {
                    $f_name = $data['f_name'];
                    $l_name = $data['l_name'];
                    $email = $data['email'];
                    $address_id = $data['address_id'];
                    $card_number = $data['card_number'];
                    $id=$data['id'];
                    $email_confirmation = $data['isEmailConfirmed'];

                    echo "Successfully logged in";
                    session_start();
                    echo "Session started ";
                    $_SESSION["username"]=$email;
                    $_SESSION["name"]=$f_name." ".$l_name;
                    $_SESSION["customerID"]=$id;
                    print_r($_SESSION);
                    header('Location: index.php');
                  }
              } else
                $msg = "Please check your inputs!";
    } else {
      $msg = "Please check your inputs!";
    }
  }
}
?>
