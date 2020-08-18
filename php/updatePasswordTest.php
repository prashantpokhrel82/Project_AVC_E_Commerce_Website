<?php
include('sql_connect.php');
include('userFunctions.php');

//print_r($_POST);
$old_password_error = $new_password_error = $new_confirm_password_error = "";
$old_password = $new_password = $new_confirm_password = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
  $salt = '$5$rounds=5000$blaster$';
  if (empty($_POST["old_password"])) {
    $old_password_error = " * Old Password is required";
  } else {
    $old_password = test_input($_POST["old_password"]);
    $old_hashed_password = crypt($old_password, $salt);
  }
  if (empty($_POST["new_password"])) {
    $new_password_error = "* New Password is required";
  } else {
    $new_password = test_input($_POST["new_password"]);
  }

  if (empty($_POST["new_confirm_password"])) {
    $new_password_error = "* New Confirm Password is required";
  } else {
    $new_confirm_password = test_input($_POST["new_confirm_password"]);
  }


  if (!empty($_POST["old_password"]) && !empty($_POST["new_password"]) && !empty($_POST["new_confirm_password"])) {

    $user_id = getUserId();
    $sql = "SELECT * from customer where id = '$user_id';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $old_password_db = $row['password'];
            if(($old_password_db == $old_hashed_password) && ($new_password == $new_confirm_password) ){
              //echo "you can change";
              $new_hashed_password = crypt($new_password, $salt);
              $stmt = $conn->prepare("UPDATE customer SET password=? where id = ?;");
              $stmt->bind_param("si", $new_hashed_password, $user_id);
              if($stmt->execute()){
                echo "<script>alert('Successfully changed password')</script>";
              }else{
                echo "<script>alert('Unsuccessful to change password')</script>";
              }

            }
            else{
              echo "<script>alert('Old password didn't match or New passwords didn't match')</script>";
              //$old_password_error = "Old password didn't match or New passwords didn't match";
            }

        }
    } else {
        echo "No account exists";
    }





  }





}
?>
