<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('connection.php');

$user_id = $_SESSION['user_id'];
$name=$_SESSION['name'];
$credit=$_SESSION['credit'];
$departmentId=$_SESSION['dept_id'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <title>My Posts</title>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styling.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
       <style>
        img{
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            border:1px solid #0066cc;
        border-bottom-color: #ffffff;
        }
    .well {
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
  box-shadow:inset 0 1px 1px rgba(0,0,0,.05)}
    .well-lg {
  padding:24px;
  
}
        .card-body{
            padding: 10px;
        }

        .slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: black;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: black;
  cursor: pointer;
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
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        
        <br>
    <div class="container" >
    <div class="card" style="width: 18rem; box-shadow: 0px 6px 20px 15px rgba(0, 0, 0, .5);">
        <img src=".\images\a1.jpg" class="rounded float-left" alt="...">
<div class=" well well-lg">
  <div class="card-body">
    <h5 class="card-title"><?php echo $name?></h5>
    <p class="card-text"><?php echo $user_id ?></p>
    <p class="card-text"><?php echo $departmentId ?></p>
      <p class="card-text"><img src=".\images\cryptocreditLogo.png" style="width:1.5em; height:1.5em; border-color: white" class="img-rounded" alt=""><?php echo $credit ?></p>
    <a href="showpulickey.php" class="btn btn-primary">Show Public Key</a>
  </div>
</div>
        </div>
</div>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
                  <div class="card" id="card">
                        
                
                  <?php
                    //run a query to look for notes corresponding to user_id
                        $sql = "SELECT * FROM post WHERE status='1' ORDER BY time DESC LIMIT 5";

                        //shows notes or alert message
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                    $user_id = $row['user_id'];
                                    $title = $row['title'];
                                    $data=$row['data'];
                                    $time = $row['time'];
                                    $time = date("F d, Y h:i:s A", $time);
                                    $sql2="SELECT * FROM user WHERE user_id='$user_id'";
                                    $result2 = mysqli_query($link, $sql2);
                                    if(!$result2){
                                          echo '<div class="alert alert-danger">Error running the query!</div>';
                                          exit;
                                      }
                                      $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

                                      $currentpostusername=$row2['name'];
                                      $currentpostusertype=$row2['profession'];

                                    $type=$_SESSION['profession'];
                                    if($type=="student"){
                                        echo "
                                      <div class='card-body'>
                                          <div class='card-body' style='border-color:beige; background-color: #f5f5f0;'>
                                              <div class='row'>
                                                  <div class='col-sm-2'><img src='.\images\a1.jpg' class='img-thumbnail'  width='50' height='50'></div>
                                                  <div class='col-sm-6'>$user_id</div>
                                              </div>
                                            <hr>
                                          <blockquote class='blockquote mb-0'>
                                            <h3>$title.</h3>
                                              <p>$data</p>
                                            <footer class='blockquote-footer'> <cite title='Source Title'>$currentpostusername</cite>
                                              <br>
                                              <cite>$time</cite></footer>
                                              <input class='btn btn-info pull-right' type='submit' name='upvote' value='Up vote' id='upvote'>
                                              <br>
                                          </blockquote>
                                          </div>
                                      </div>
                                  ";
                                    }else{

                                        if($currentpostusertype == "student"){
                                             echo "
                                            <div class='card-body'>
                                                <div class='card-body' style='border-color:beige; background-color: #f5f5f0;'>
                                                    <div class='row'>
                                                        <div class='col-sm-2'><img src='.\images\a1.jpg' class='img-thumbnail'  width='50' height='50'></div>
                                                        <div class='col-sm-6'>$user_id</div>
                                                    </div>
                                                  <hr>
                                                <blockquote class='blockquote mb-0'>
                                                  <h3>$title.</h3>
                                                    <p>$data</p>
                                                  <footer class='blockquote-footer'> <cite title='Source Title'>$currentpostusername</cite>
                                                    <br>
                                                    <cite>$time</cite></footer>
                                                    <br>
                                                    <div class='slidecontainer'>
                                                      <input class='pull-right' type='range' min='1' max='10' value='5' class='slider' id='myRange' style='width:20%;''>
                                                      <br>
                                                      <p class='pull-right'>Rating... <span id='demo'></span></p>
                                                    </div>
                                                    <br>
                                                </blockquote>
                                                </div>
                                            </div>
                                        ";
                                        }else{
                                            echo "
                                                <div class='card-body'>
                                                    <div class='card-body' style='border-color:beige; background-color: #f5f5f0;'>
                                                        <div class='row'>
                                                            <div class='col-sm-2'><img src='.\images\a1.jpg' class='img-thumbnail'  width='50' height='50'></div>
                                                            <div class='col-sm-6'>$user_id</div>
                                                        </div>
                                                      <hr>
                                                    <blockquote class='blockquote mb-0'>
                                                      <h3>$title.</h3>
                                                        <p>$data</p>
                                                      <footer class='blockquote-footer'> <cite title='Source Title'>$currentpostusername</cite>
                                                        <br>
                                                        <cite>$time</cite></footer>
                                                        <input class='btn btn-info pull-right' type='submit' name='upvote' value='Up vote' id='upvote'>
                                                        <br>
                                                    </blockquote>
                                                    </div>
                                                </div>
                                            ";

                                        }
                                     
                                    }
                                          
                                    
                                }
                            }else{
                                echo '<div class="alert alert-warning">You have not created any notes yet!</div>'; exit;
                            }
                            
                        }else{
                            echo '<div class="alert alert-warning">An error occured!</div>'; exit;
                        //    echo "ERROR: Unable to excecute: $sql." . mysqli_error($link);
                        }

                  ?>
                </div>
            </div>
  <div class="col-sm-1" style="margin-left:0px; margin-right:-50px;">
    <div class="card" style="width:20em;">
      <div class="card-body">
        
        <div class="container">
            <hr width="20%" align="left">
            <div class="row">
                
                <div class="col-sm-1"><img src=".\images\a1.jpg" class="img-thumbnail" alt="" width="50" height="50"></div><div class="col-sm-1">John Doe</div><div class="col-sm-1"><img src=".\images\cryptocreditLogo.png" style="width:1.5em; height:1.5em; border-color: white" class="img-rounded" alt="">10</div>
            </div>
            <hr width="20%" align="left">
            <div class="row">
                <div class="col-sm-1"><img src=".\images\a2.png" class="img-thumbnail" alt="" width="50" height="50"></div><div class="col-sm-1">John Doe</div><div class="col-sm-1"><img src=".\images\cryptocreditLogo.png" style="width:1.5em; height:1.5em; border-color: white" class="img-rounded" alt="">20</div>
            </div>
            <hr width="20%" align="left">
            <div class="row">
                <div class="col-sm-1"><img src=".\images\a2.png" class="img-thumbnail" alt="" width="50" height="50"></div><div class="col-sm-1">John Doe</div><div class="col-sm-1"><img src=".\images\cryptocreditLogo.png" style="width:1.5em; height:1.5em; border-color: white" class="img-rounded" alt="">40</div>
</div>
  <hr width="20%" align="left">
      </div>
    </div>
  </div>
  
</div>
        </div>
    </div>

    <script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
    }
    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>