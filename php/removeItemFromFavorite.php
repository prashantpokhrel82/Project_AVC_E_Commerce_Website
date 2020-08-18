<?php

include 'sql_connect.php';

	session_start();


	if ($_POST)
{
	$customerID=$_POST["customerID"];
	$itemID=$_POST["itemID"];


	$sql="DELETE FROM `favourites` WHERE item_id=$itemID AND customer_id=$customerID";
	$result=mysqli_query($conn,$sql);
	if($result)
		echo "Removed successfully";
}
else
echo "Error! Couldn't get post data."





?>
