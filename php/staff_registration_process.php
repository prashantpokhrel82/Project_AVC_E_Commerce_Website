<?php
	include 'sql_connect.php';
	if($_POST){

    $fullName=$_POST['admin_fullName_in'];
		$username=$_POST['admin_username_in'];
		$password=$_POST['admin_password_in'];
    $confirm_password = $_POST['admin_confirm_password_in'];
    if($password == $confirm_password){
			$sql="SELECT * FROM admin WHERE username='".$username."';";
			$result=mysqli_query($conn,$sql);
			if($result){
				$row = mysqli_fetch_assoc($result);
				$test = print_r($row);
				//echo "User already exists. Please chose the different username";

				echo $test;
			}
			else
			{

				$sql="INSERT INTO admin(name, username, password)
				values('"
					.$fullName. "', '"
					.$username. "' , '"
					.$password. "')";
				$result=mysqli_query($conn,$sql);
				if($result){
					echo "Successfully Created the account";
				}
				else{
					echo "Can't insert the data";
					//echo "false";
				}
			}

    }
    else{
      echo "The password didn't match. Please try again.";
			//echo "false";
    }

	}
	else{
		echo "no post";
		print_r($_POST);
	}

?>
