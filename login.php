<?php

//Start session
session_start();
//Connect to the database
include("connection.php");
//Check user inputs
    //Define error messages
$missingUserid = '<p><stong>Please enter your user id!</strong></p>';
$invalidUserid='<p><stong>Please enter a valid user id.</strong></p>';
$missingPassword = '<p><stong>Please enter your password!</strong></p>'; 
$invalidPassword='<p><stong>Invalid password!</strong></p>';
$errors='';
$user_id='';
$password='';

    //Get email and password
    //Store errors in errors variable
if(empty($_POST["loginuserid"])){
    $errors .= $missingUserid;   
}else{
    $user_id = filter_var($_POST["loginuserid"], FILTER_SANITIZE_EMAIL);
}
if(empty($_POST["loginpassword"])){
    $errors .= $missingPassword;   
}else{
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);
}
    //If there are any errors
if($errors){
    //print error message
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}else{
    //else: No errors
    //Prepare variables for the query
    $user_id = mysqli_real_escape_string($link, $user_id);
    $password = mysqli_real_escape_string($link, $password);
    $password = hash('sha256', $password);
            //Run query: Check combinaton of email & password exists
    $sql = "SELECT * FROM users WHERE user_id='$user_id' AND password='$password' AND activation='activated'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query!</div>';
        exit;
    }
            //If email & password don't match print error
    $count = mysqli_num_rows($result);
    if($count !== 1){
        echo '<div class="alert alert-danger">Wrong Username or Password</div>';
    }
    else {
            //log the user in: Set session variables
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['name']=$row['name'];
            $_SESSION['email']=$row['email'];
            $_SESSION['credit']=$row['credit'];
            $_SESSION['public_key']=$row['public_key'];
            $_SESSION['profession']=$row['profession'];
            echo "success";
        }
    }
}

?> 
