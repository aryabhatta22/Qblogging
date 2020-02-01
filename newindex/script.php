<?php
session_start();
require_once (__DIR__.'/config.php');

$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}

$var=@$_GET['token'];


if($var=='userlogin')
{
	
	$id=$_POST['loginuserid'];
	$pass=$_POST['loginpassword'];


	$q="select * from user where user_id='$id' AND password='$pass'";
	$run=mysqli_query($conn,$q);
	$num=mysqli_num_rows($run);
	if($num!=0)
	{
		$_SESSION['userlogin']=$id;
		
		echo "<script>window.open('profile.php','_self')</script>";
	}
	else
	{
		echo "<script>alert('Incorrect user Id or password')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}

?>