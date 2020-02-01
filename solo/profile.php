<?php

session_start();
require_once (__DIR__.'/config.php');
$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}


$user_id = $_SESSION['userlogin'];
// $name=$_SESSION['name'];
// $credit=$_SESSION['credit'];
// $departmentId='';
// $departmentName='';
//get username and email
$q = "SELECT * FROM user WHERE user_id='$user_id'";
$qrun=mysqli_query($conn,$q);
$qrow=mysqli_fetch_array($qrun);
$count = mysqli_num_rows($qrun);

// if($count == 1)
// {
//     $departmentId = $row['dept_id'];
//     $sql="SELECT * FROM department WHERE dept_id='$departmentId'";
//     $result=mysqli_query($conn, $sql);
//     if(!$result)
//     {
//     echo '<div class="alert alert-danger">There was an error running sql query!</div>';
//     exit;
//     }
//     else
//     {
//       $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
//       $departmentName=$row['departmentName'];
//     }
// }
// else
// {
//     echo "<div class='alert alert-danger' style='margin-top:55px'>There was an error retrieving the username and email from the database</div>";   
// }

$user = array();
$res1=$conn->query("SELECT * FROM user WHERE user_id='$user_id'");
while($roww1 =mysqli_fetch_assoc($res1))
{
  array_push($user,$roww1);
}
//echo count($empl0);
//print_r($user);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <title>My Posts</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styling.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
       <style>
        img
        {
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            border:1px solid #0066cc;
            border-bottom-color: #ffffff;
        }
        .well 
        {
          min-height:20px;
          padding:19px;
          margin-bottom:20px;
          background-color:#ffffff;
          border:1px solid #0066cc;
          border-top-color: #ffffff;
          width:227px;
          border-bottom-left-radius: 4px;
          border-bottom-left-radius:4px;
          border-top-left-radius: 0px;
          border-top-right-radius: 0px;
          -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.05);
          box-shadow:inset 0 1px 1px rgba(0,0,0,.05)
        }
    .well-lg {
  padding:24px;
  
}
        .card-body{
            padding: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-header">
              <a class="navbar-brand" href="#">Q-Blogging</a>
            </div>

            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">My Posts</a>
              </li>
              <li><a href="#">Notification</a></li>
            </ul>
              
            <ul class="nav navbar-nav navbar-right">
              <li><a href="writing_blogs.php"><span class="glyphicon glyphicon-edit"></span> Write Post</a></li>
              <li><a href="index.php?logout=1"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
            </ul>

        </div>
    </nav>

    <div class="container" style="margin-left: 0px; margin-right: 10px; margin-top: 55px;" >
        <div class="row">

          <?php
          foreach($user as $usr)
          {
        
          ?>
            <div class="col-sm-3">
                  <div class="card">
                      <div class="card-body">
                        
                        <br>
                        <div class="container" >
                            <div class="card" style="width: 18rem; box-shadow: 0px 6px 20px 15px rgba(0, 0, 0, .5);">
                                <img src=".\images\a1.jpg" class="rounded float-left" alt="...">
                                <div class=" well well-lg">
                                    <div class="card-body">
                                      <h5 class="card-title"><?php echo $usr['name']; ?></h5>
                                      <p class="card-text"><?php echo $usr['user_id']; ?></p>
                                        <p class="card-text"><img src=".\images\cryptocreditLogo.png" style="width:1.5em; height:1.5em; border-color: white" class="img-rounded" alt=""><?php echo $usr['credit'] ?></p>
                                      <a href="showpulickey.php" class="btn btn-primary">Show Public Key</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                      </div>
                  </div>
            </div>
            <?php
            }

            ?>


            <div class="col-sm-8">
                  <div class="card">
                        <div class="card-body">
                          
                            <div class="card-body" style="border-color:beige; margin-top: 1.6em; background-color: #f5f5f0;">
                                <div class="row">
                                    <div class="col-sm-2" style="margin-top: 1em; margin-left: 1.5em;"><img src=".\images\a1.jpg" class="img-thumbnail" alt="" width="50" height="50"></div>
                                    <div class="col-sm-6" style="margin-top: 2em;">User Id</div>
                                </div>
                              <hr>
                            <blockquote class="blockquote mb-0">
                              <h3>Microsoft Research introduced a new NN model that beats Google and the others<br>
                                <br>
                              <footer class="blockquote-footer" style="font-weight: 5em;"> MS researcher recently introduced a new deep ( indeed very deep) NN model (PReLU Net) [1] and they push the state of art in ImageNet 2012 dataset from 6.66% (GoogLeNet) to 4.94% top-5 error rate.

In this work, they introduce an alternation of well-known ReLU activation function. They call it PReLu (Parametric Rectifier Linear Unit). 
                                <br><br>
                                <cite>10:00:00</cite></footer>
                            </blockquote>
                            </div>
                        </div>
                  </div>
            </div>


            <div class="col-sm-1" style="margin-left:0px; margin-right:-50px; margin-top: 0.3em;">
                  <div class="card" style="width:20em;">
                      <div class="card-body">
                        
                        <div class="container">
                              <hr width="20%" align="left">
                              <div class="row">
                                  
                                  <div class="col-sm-1"><img src=".\images\a1.jpg" class="img-thumbnail" alt="" width="50" height="50"></div><div class="col-sm-1" style="color:white; margin-top: 0.6em;">John Doe</div><div class="col-sm-1"><img src=".\images\cryptocreditLogo.png" style="width:1.5em; height:1.5em; border-color: white" class="img-rounded" alt="">10</div>
                              </div>
                              <hr width="20%" align="left">
                              <div class="row">
                                  <div class="col-sm-1"><img src=".\images\a2.png" class="img-thumbnail" alt="" width="50" height="50"></div><div class="col-sm-1" style="color:white; margin-top: 0.6em;">John Doe</div><div class="col-sm-1"><img src=".\images\cryptocreditLogo.png" style="width:1.5em; height:1.5em; border-color: white" class="img-rounded" alt="">20</div>
                              </div>
                              <hr width="20%" align="left">
                              <div class="row">
                                  <div class="col-sm-1"><img src=".\images\a2.png" class="img-thumbnail" alt="" width="50" height="50"></div><div class="col-sm-1" style="color:white; margin-top: 0.6em;">John Doe</div><div class="col-sm-1"><img src=".\images\cryptocreditLogo.png" style="width:1.5em; height:1.5em; border-color: white" class="img-rounded" alt="">40</div>
                              </div>
                              <hr width="20%" align="left">
                      </div>
                    </div>
                </div>
            
          </div>


        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="mynotes.js"></script>
</body>
</html>