<?php
if (isUserLoggedIn()){
  $customerID = $_SESSION["customerID"];
  $STATUS = 'PENDING';
}


 if($_SERVER["REQUEST_METHOD"] == "POST"){
   if (!empty($_POST["receipt_number"])) {
     // sql to load data in checkout

     $receipt_number = $_POST['receipt_number'];

     $sql="SELECT * FROM item JOIN cart ON item.id = cart.item_id WHERE customer_id=$customerID";
     $result=mysqli_query($conn,$sql);
   	 while($row = mysqli_fetch_assoc($result)) {
       $item_id = $row['item_id'];
       $quantity = $row['quantity'];

       $stmt = $conn->prepare("INSERT INTO pending_order(customer_id, item_id, quantity, receipt_number, status) values(?,?,?,?,?)");
       $stmt->bind_param("iiiss", $customerID, $item_id, $quantity, $receipt_number, $STATUS);
       if($stmt->execute()){
         //echo "<script>alert('Data inserted in the pending order')</script>";
         //echo 'inserted';

       }
     }//close while
     clearShoppingCart();
   } //closing of if not empty
   if (!empty($_POST["card_number"])  && !empty($_POST["name_on_card"]) && !empty($_POST["expiry_date"]) && !empty($_POST["cvv_number"])) {
     header('Location: billing_address.php');
   }

 }// closing of if request method is post

 function clearShoppingCart(){
    $conn = $GLOBALS['conn'];
    $customerID = $_SESSION["customerID"];
    $sql="DELETE FROM `cart` WHERE customer_id=$customerID";
   	$result=mysqli_query($conn,$sql);
   	if($result)
   		echo "";//cart cleared
 }
?>
