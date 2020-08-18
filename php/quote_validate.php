<?php
include('./php/sql_connect.php');
//print_r($_POST);
$product_error = $product_number_error = $email_error = "";
$product_name = $product_number =  $email = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if (empty($_POST["quote-product"])) {
    $product_error = " * Product name is required";
  } else {
    $product_name = test_input($_POST["quote-product"]);
  }
  if (empty($_POST["quote-product-number"])) {
    $product_number_error = "* Product quantity is required";
  } else {
    $product_number = test_input($_POST["quote-product-number"]);
  }
  if (empty($_POST["email"])) {
    $email_error = " * Email Address is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (!empty($_POST["quote-product"]) && !empty($_POST["quote-product-number"]) && !empty($_POST["email"])) {

    $sql = "SELECT * from item where name = '$product_name';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $item_id = $row['id'];
            $stmt = $conn->prepare("INSERT INTO quote(item_id, quantity, email) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $item_id, $product_number, $email);
            if($stmt->execute()){
              echo "Successfully Requested";
            }
        }
    } else {
        echo "Requested Product doesn't exists";
    }





  }





}
?>
