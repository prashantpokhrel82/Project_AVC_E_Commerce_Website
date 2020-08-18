<?php
	include 'sql_connect.php';
	if($_POST){
		$newStatus = $_POST['newStatus'];
    $id = $_POST['id'];

        $sql="UPDATE pending_order SET d_status = '$newStatus' WHERE id = $id;";
		    $result=mysqli_query($conn,$sql);



        if($result)
			    echo "Success";
		    else
			    echo $conn->connect_error;




	}
?>
