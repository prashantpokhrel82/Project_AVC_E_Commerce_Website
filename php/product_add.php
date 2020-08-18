<?php

include './sql_connect.php';
if($_POST){
  $name=$_POST['name'];
  $price=$_POST['price'];
  $description=$_POST['description'];
  //$image_url = $_POST['image_url'];

if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
			$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "JPG" => "image/JPG");
			$filename = $_FILES["photo"]["name"];
			$filetype = $_FILES["photo"]["type"];
			$filesize = $_FILES["photo"]["size"];

			// Verify file extension
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!array_key_exists($ext, $allowed))
				die("Error: Please select a valid file format.");

			// Verify file size - 5MB maximum
			$maxsize = 5 * 1024 * 1024;
			if($filesize > $maxsize)
				die("Error: File size is larger than the allowed limit.");

			// Verify MYME type of the file
			if(in_array($filetype, $allowed)){
				// Check whether file exists before uploading it
				if(file_exists("../img/item_img/" . $_FILES["photo"]["name"])){
					echo $_FILES["photo"]["name"] . " is already exists.";
				}
				else{

          $sql="INSERT INTO item (name,price,description,image_url) VALUES ('$name', $price, '$description', '$filename');";
  		$result=mysqli_query($conn,$sql);



						if($result){
							move_uploaded_file($_FILES["photo"]["tmp_name"], "../img/item_img/" . $_FILES["photo"]["name"]);
							echo '<script> alert("Success Dabase Insertion ! Your file was uploaded successfully.")</script>;';
							header('Location:../add_product.php');

						}


						else
							echo $conn->connect_error;


					}
				}
			}
		}
		else{
			echo "Error: " . $_FILES["photo"]["error"];
		}

?>
