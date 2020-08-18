<?php 

include 'sql_connect.php';


	if ($_POST)
{
	$productID=$_POST["productID"];
	
	$sql="DELETE FROM `item` WHERE id=$productID";
	$result=mysqli_query($conn,$sql);
	if($result)
		echo "Removed successfully";
}
else
echo "Error! Couldn't get post data."

	



?>