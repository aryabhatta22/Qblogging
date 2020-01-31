
<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create an account</title>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <script type="text/javascript" src="jquery-3.4.1.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		*
		{
		  margin: 0;
		  padding: 0;
		  text-decoration: none;
		  font-family: montserrat;
		  box-sizing: border-box;
		}

		h1{
			margin: 20px;
		}

		body
		{
		  min-height: 100vh;
		  background-image: linear-gradient(120deg,#2d3436,#2d3436,#2d3436);
		}

		.login-form
		{
		  width: 360px;
		  background: #f1f1f1;
		  /*height: 580px;*/
		  padding: 10px 40px;
		  border-radius: 10px;
		  position: absolute;
		  left: 50%;
		  top: 50%;
		  transform: translate(-50%,-50%);
		}

		.login-form h1
		{
		  text-align: center;
		  margin-bottom: 30px;
		}

		.txtb
		{
		  border-bottom: 2px solid #adadad;
		  position: relative;
		  margin: 20px 0;
		}

		.txtb input
		{
		  font-size: 15px;
		  color: #333;
		  border: none;
		  width: 100%;
		  outline: none;
		  background: none;
		  padding: 0 5px;
		  height: 40px;
		}

		.txtb span::before
		{
		  content: attr(data-placeholder);
		  position: absolute;
		  top: 50%;
		  left: 5px;
		  color: #adadad;
		  transform: translateY(-50%);
		  z-index: -1;
		  transition: .5s;
		}

		.txtb span::after
		{
		  content: '';
		  position: absolute;
		  width: 0%;
		  height: 2px;
		}

		.focus + span::before
		{
		  top: -5px;
		}
		.focus + span::after
		{
		  width: 100%;
		}

		.logbtn
		{
		  border-radius: 12px;
		  display: block;
		  width: 100%;
		  height: 50px;
		  border: none;
		  background: linear-gradient(120deg,#2d3436,#636e72,#2d3436);
		  background-size: 200%;
		  color: #fff;
		  outline: none;
		  cursor: pointer;
		  transition: .5s;
		}

		.logbtn:hover
		{
		  background-position: right;
		  transform: scale(1.05);
		}

		.bottom-text
		{
		  margin-top: 30px;
		  text-align: center;
		  font-size: 13px;
		}
		.radio-btn {
			text-align: center;

		}
		.signbtn
		{
		  border-radius: 14px;
		  margin-top: 20px;
		  display: block;
		  width: 30%;
		  height: 50px;
		  border: none;
		  background: linear-gradient(120deg,#2d3436,#636e72,#2d3436);
		  background-size: 200%;
		  color: #fff;
		  outline: none;
		  cursor: pointer;
		  transition: .5s;
		}

		.signbtn:hover
		{
			transform: scale(1.05);
		}
	</style>
</head>
<body>
	<form class="login-form" id="signupform" method="post">
        <h1>Sign Up</h1>
        <!-- error message -->
        <div id="#signupmessage"></div>

        <div class="form-group">
        	<div class="radio-btn">
		        <input type="radio" name="type" value="student"> Student &nbsp&nbsp&nbsp&nbsp
				<input type="radio" name="type" value="faculty"> Faculty
			</div>
        </div>

        <div class="form-group">
        	<div class="txtb">
	          <input type="text" name="user_id" id="user_id">
	          <span data-placeholder="User ID"></span>
	        </div>
        </div>

        <div class="form-group">
        	<div class="txtb">
	          <input type="email" name="email" id="email">
	          <span data-placeholder="Email"></span>
	        </div>
        </div>

        <div class="form-group">
        	<div class="txtb">
	          <input type="password" name="password" id="password">
	          <span data-placeholder="Password"></span>
	        </div>
        </div>

        <input type="submit" class="logbtn" value="Signup" name="signup">


        <div class="bottom-text">
          <h4> Already have an account? </h4> 
        </div>
        <div class="container">
          <center><a href="userlogin.php" class="btn btn-default pull-left">Login</a></center>
          <center><a href="index.php" class="btn btn-default pull-right">Cancel</a></center>
        </div>

      </form>

      <script type="text/javascript">
      $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtb input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      //Ajax Call for the sign up form
		//Once the form is submitted
		$("#signupform").submit(function(event){
		    //prevent default php processing
		    event.preventDefault();
		    //collect user inputs
		    var datatopost = $(this).serializeArray(); //make array of objects containing values of signup form
		    $.ajax({
		        url: "signup.php",
		        type: "POST",
		        data: datatopost,
		        success: function(data){
		            if(data){
		         $("#signupmessage").html(data);
		            }
		        },
		        error: function(){
		            
		            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
		        }
		    });
		});

      </script>
</body>
</html>