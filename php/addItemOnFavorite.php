<?php
	include 'sql_connect.php';

	session_start();
	//var_dump($_SESSION);

if ($_POST)
{
	$itemID=$_POST["itemID"];
	$customerID=$_POST["customerID"];
	//echo "item: ".$itemID." customer: ".$customerID;

	$sql="INSERT INTO favourites(customer_id, item_id) VALUES ($customerID,$itemID)";
	$result=mysqli_query($conn,$sql);
	if($result){
		echo "Item successfully added in the favorite list";
	}else {
			echo "Already Added in the list";
		}
}
else
	echo "Error! Unsuccessful to add the item"; //Couldn't get post data.

?>
