<?php
	include 'sql_connect.php';
	if($_POST){
		$name=$_POST['name'];
		$price=$_POST['price'];
    $description=$_POST['description'];
		$image_url = $_POST['image_url'];

        $sql="INSERT INTO item (name,price,description,image_url) VALUES ('$name', $price, '$description', '$image_url');";
		$result=mysqli_query($conn,$sql);

        if($result)
			    echo "Success";
		    else
			    echo $conn->connect_error;



	}
?>
