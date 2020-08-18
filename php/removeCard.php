<?php
	include 'sql_connect.php';
	session_start();
	//var_dump($_SESSION);

if ($_POST)
{
	$customerID=$_POST["customerID"];
	//echo "item: ".$itemID." customer: ".$customerID;

	$sql="UPDATE customer SET card_number=null WHERE id = $customerID";
	$result=mysqli_query($conn,$sql);
	if($result){
    echo "Card Removed Successfully";
  }else{
    echo "Error in sql";
  }
}
else
	echo "No card to remove"; //Couldn't get post data.

?>
