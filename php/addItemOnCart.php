<?php
	include 'sql_connect.php';

	session_start();
	//var_dump($_SESSION);

if ($_POST)
{
	$itemID=$_POST["itemID"];
	$customerID=$_POST["customerID"];
	//echo "item: ".$itemID." customer: ".$customerID;

	$sql="INSERT INTO cart(customer_id, item_id, quantity) VALUES ($customerID,$itemID,1) ON DUPLICATE KEY UPDATE quantity = quantity+1";
	$result=mysqli_query($conn,$sql);
	if($result)
		echo "Item successfully added in the cart";
}
else
	echo "Error! Unsuccessful to add the item"; //Couldn't get post data.

?>
