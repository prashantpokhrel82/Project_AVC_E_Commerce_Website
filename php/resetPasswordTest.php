<?php
include('sql_connect.php');
if ($_SERVER["REQUEST_METHOD"]=="POST"){
  $id = $_POST['customerID'];
  $new_password = $_POST['newPassword'];

  $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
  $stmt = $conn->prepare("UPDATE customer SET password=? where id = ?;");
  $stmt->bind_param("si", $new_hashed_password, $id);
  if($stmt->execute()){
    echo 'true';
  }else{
    echo 'false';
  }

}

?>
