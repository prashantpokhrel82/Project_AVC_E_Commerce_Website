<?php
session_start();
if(session_destroy()){
	echo "Session Destroyed";
	header('Location: ../index.php');
}
?>
