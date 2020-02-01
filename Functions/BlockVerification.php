<?php
session_start();
session_start();
require_once (__DIR__.'/config.php');

$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}

$currentRating=0;



?> 
