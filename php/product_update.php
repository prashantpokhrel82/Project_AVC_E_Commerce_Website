<?php
	include 'sql_connect.php';

	if($_POST){
		$id=$_POST['productID'];
		$name=$_POST['name'];
		$price=$_POST['price'];
		$description=$_POST['description'];


		$sql="UPDATE item SET name='$name',price='$price', description='$description' WHERE id=$id";
		$result=mysqli_query($conn,$sql);
		if($result)
            echo "Updated successfully";
        }
        else{
            echo $result->error_log;
        }
	

?>