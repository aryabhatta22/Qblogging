<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
   	  header("location: index.php");
	}
	include('connection.php');

	$publicKey=$_SESSION['public_key'];
	echo '<div>Your public key is : $publicKey</div>';
?>