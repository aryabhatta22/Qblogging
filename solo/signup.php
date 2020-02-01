<?php
//Start session
session_start();
//Connect to the database
include('connection.php');

//check user inputs
//    define error messages
$missingUserid='<p><strong>Please enter a username!</strong></p>';
$missingEmail='<p><strong>Please enter your email address!</strong></p>';
$invalidEmail='<p><strong>Please enter a valid email address!</strong></p>';
$missingPassword='<p><strong>Please enter a Password!</strong></p>';
$invalidPassword='<p><strong>Your password should be at least 6 characters long and include one capital letter and one number!</strong></p>';
$missingType='<p><strong>Please select a user type!</strong></p>';
$errors='';

$type='';
$user_id='';
$email='';
$password='';

//Get username
if(empty($_POST["user_id"])){
    $errors .= $missingUserid;
}else{
    $user_id = filter_var($_POST["user_id"],FILTER_SANITIZE_STRING);
}
//Get email
if(empty($_POST["email"])){
    $errors .= $missingEmail;
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;
    }
}
//Get passwords
if(empty($_POST["password"])){
    $errors .= $missingPassword;
}elseif(!(strlen($_POST["password"])>6 and preg_match('/[A-Z]/',$_POST["password"]) and preg_match('/[0-9]/',$_POST["password"]))){
    $errors .= $invalidPassword;
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
}

//get user type
if(empty($_POST["type"])){
    $errors.=$missingType;
}else{
    $type=$_POST["type"];
}
//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'. $errors .'</div>';
    echo $resultMessage; 
    exit;
}
//No errors
//check user already exist or not
$user_id = mysqli_real_escape_string($link, $user_id);
$email = mysqli_real_escape_string($link, $email);

//If userid exists in the users table print error
$sql = "SELECT * FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
//    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';  
    exit;
}
//else
//If email exists in the users table print error
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; 
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';  
    exit;
}

$name='';
$dept_id='';
$credit=0;
//check user exists in the university database or not
if($type=="student"){
    $sql="SELECT * FROM student WHERE student_id='$user_id' AND email='$email'";
    $result=mysqli_query($link,$sql);
    $results = mysqli_num_rows($result);
    if($results==0){
        echo '<div class="alert alert-danger">Invalid user!.User details are not found in university database!</div>'; 
        exit;
    }else{
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $name=$row['name'];
        $dept_id=$row['dept_id'];
        $credit=100;
    }
}else{
    $sql="SELECT * FROM faculty WHERE faculty_id='$user_id' AND email='$email'";
    $result=mysqli_query($link,$sql);
    $results = mysqli_num_rows($result);
    if($results==0){
        echo '<div class="alert alert-danger">Invalid user!.User details are not found in university database!</div>'; 
        exit;
    }else{
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $name=$row['name'];
        $dept_id=$row['dept_id'];
        $credit=500;
    }
    
}

//now create other  variables to insert in the user table
//generate password hash code
$password = mysqli_real_escape_string($link, $password);
//$password = md5($password);
$password = hash('sha256', $password);
//128 bits -> 32 characters
//256 bits -> 64 characters

//Create a unique activation code
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
    //byte: unit of data = 8 bits
    //bit: 0 or 1
    //16 bytes = 16*8 = 128 bits
    //(2*2*2*2)*2*2*2*2*...*2
    //16*16*...*16
    //32 characters

//now insert data in user table
$publicKey='123';
$sql2="INSERT INTO user (`user_id`,`password`,`name`,`dept_id`,`profession`,`email`,`credit`,`activation`,`public_key`) VALUES ('$user_id','$password','$name','$dept_id','$type','$email','$credit','$activationKey','$publicKey')";

$result2 = mysqli_query($link, $sql2);
if(!$result2){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    exit;
}
//Send the user an email with a link to activate.php with their email and activation code
$message = "Please click on this link to activate your account:\n\n";

$message .= "http://localhost/hack/Qblogging/solo/activate.php?email=" . urlencode($email) . "&key=$activationKey";
if(mail($email, 'Confirm your Registration', $message, 'From:'.'sk9971krishna@gmail.com')){
       echo "<div class='alert alert-success'>Thank for your registring! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
}


?>