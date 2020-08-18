<?php
	include 'sql_connect.php';
	if($_POST){
		$username=$_POST['admin_username_in'];
		$password=$_POST['admin_password_in'];

        $sql="SELECT name FROM admin WHERE username = '$username' AND password='$password';";
				
		$result=mysqli_query($conn,$sql);
		if($result){
				session_start();
				$_SESSION["admin-username"] = $username;
				//echo "Login Successful";
				echo $_SESSION["admin-username"];
			}

			else{
				echo false;
			}


	}

?>
