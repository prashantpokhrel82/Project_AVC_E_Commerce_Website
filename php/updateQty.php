<?php 

include 'sql_connect.php';

	session_start();


	if ($_POST)
{
	$customerID=$_POST["customerID"];
	$itemID=$_POST["itemID"];
	$qty=$_POST["newQty"];
	//echo $customerID." hell yeah  ".$itemID." ".$qty;


	$sql="UPDATE cart SET quantity = $qty WHERE item_id=$itemID AND customer_id=$customerID";
	$result=mysqli_query($conn,$sql);
	if($result)
		echo "Updated successfully";
}
else
echo "Error! Couldn't get post data."

	



?>