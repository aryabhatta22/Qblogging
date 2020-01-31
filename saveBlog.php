<?php

session_start();
include('connection.php');

//define error message
$missingTitle='<p><strong>Please enter a title!</strong></p>';
$missingData='<p><strong>Please add some descripton to the blog!</strong></p>';
$missingPrivateKey='<p><strong>Please enter private key!</strong></p>';
$invalidPrivateKey='<p><strong>Please enter your valid private key!</strong></p>';
$errors='';
$title='';
$privateKey='';
$data='';


//get tile
if(empty($_POST["title"])){
    $errors .= $missingTitle;
}else{
    $title= filter_var($_POST["title"],FILTER_SANITIZE_STRING);
}
//get post data
if(empty($_POST["data"])){
    $errors .= $missingData;
}else{
    $data= filter_var($_POST["data"],FILTER_SANITIZE_STRING);
}

//check for validity of private key



//get private key
if(empty($_POST["privateKey"])){
    $errors .= $missingPrivateKey;
}else{
    $publicKey=$_SESSION['public_key'];
    $privateKey=$_POST["privateKey"];
    //verifying public and private key
    $data2 = "Verified";
    openssl_sign($data2, $raw_signature, $privateKey);
    $signature = base64_encode($raw_signature);
    $raw_signature = base64_decode($signature);
    $result = openssl_verify($data2, $raw_signature, $publicKey);
    if($result==0){
        $errors.=$invalidPrivateKey;
    }
}
//if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'. $errors .'</div>';
    echo $resultMessage; 
    exit;
}
//no errors

//then
//Prepare variables for the queries

//get user_id
$user_id = $_SESSION['user_id'];
$user_id = mysqli_real_escape_string($link, $user_id);

$title=mysqli_real_escape_string($link, $title);
$data=mysqli_real_escape_string($link, $data);
$time = time();


$status=0;
$no_approve=0;
$no_disapprove=0;
$milestone=0;
$approve_point=0;
$disapprove_point=0;
$dept_id=$row['dept_id'];

//check for usertype
if($_SESSION['profession']=="faculty"){
    $status=1;
}else{
    $facultySize=0;
    $sql2="SELECT user_id FROM user WHERE profession='faculty' AND dept_id='$dept_id'";
    $result2=mysqli_query($link, $sql2);
    $facultySize=mysqli_num_rows($result2);
    $milstone=floor(facultySize/2)+1;
    
}
//run query to store post in post table
$sql3="INSERT INTO post (`user_id`,`status`,`no_approve`,`no_disapprove`,`milestone`,`approve_point`,`disapprove_point`,`title`,`data`,`time`) VALUES ('$user_id','$status','$no_approve','$no_disapprove','$milestone','$approve_point','$disapprove_point','$title','$data','$time')";


$result3 = mysqli_query($link, $sql3);
if(!$result3){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    exit;
}else{
    echo "<div class='alert alert-success'>Thank for your post!, It has been submitted for verification by faculty of your department!</div>";
}
?>
