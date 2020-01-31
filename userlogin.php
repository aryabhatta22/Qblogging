<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>user login</title>
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
		  padding: 80px 40px;
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
		  margin: 30px 0;
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
		  margin-top: 40px;
		  text-align: center;
		  font-size: 13px;
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
			transform: scale(1.07);
		}
	</style>
</head>
<body>
	<form class="login-form" id="loginform" method="post">
        <h1>Login</h1>
        <!-- error message -->
        <div id="#loginmessage"></div>
        <div class="form-group">
        	<div class="txtb">
          	<input type="text" name="loginuserid" id="loginuserid">
          	<span data-placeholder="User id"></span>
        	</div>
        </div>
        <div class="form-group">
        	<div class="txtb">
	          <input type="password" name="loginpassword" id="loginpassword">
	          <span data-placeholder="Password"></span>
	        </div>
        </div>
        <input class="btn btn-primary" name="login" type="submit" value="login">
        <input type="submit" class="logbtn" value="Login">
        <a style="cursor: pointer" data-dismiss="modal" data-target="#forgotpasswordModal" data-toggle="modal">
                      Forgot Password?
           </a>

        <div class="bottom-text">
          <h4> Don't have account? </h4> 
        </div>
        <div class="container">
          <!-- <center><input type="submit" class="signbtn" value="Sign Up" name="login"></center> -->
          <center><a href="user_signup.php" class="btn btn-default pull-left">Sign up</a></center>
          <center><a href="index.php" class="btn btn-default pull-right">Cancel</a></center>
        </div>

      </form>

      <!--Forgot password form-->
      <form method="post" id="forgotpasswordform">
        <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Forgot Password? Enter your email address: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--forgot password message from PHP file-->
                  <div id="forgotpasswordmessage"></div>
                  

                  <div class="form-group">
                      <label for="forgotemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email" maxlength="50">
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn btn-primary" name="forgotpassword" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
              </div>
          </div>
      </div>
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

      //Ajax Call for the login form
		//Once the form is submitted
		$("#loginform").submit(function(event){ 
		    //prevent default php processing
		    event.preventDefault();
		    //collect user inputs
		    var datatopost = $(this).serializeArray();
		//    console.log(datatopost);
		    //send them to login.php using AJAX
		    $.ajax({
		        url: "login.php",
		        type: "POST",
		        data: datatopost,
		        success: function(data){
		            if(data == "success"){
		                window.location = "profile.php";
		            }else{
		                $('#loginmessage').html(data);   
		            }
		        },
		        error: function(){
		            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
		            
		        }
		    
		    });

		});

		//Ajax Call for the forgot password form
		//Once the form is submitted
		$("#forgotpasswordform").submit(function(event){ 
		    //prevent default php processing
		    event.preventDefault();
		    //collect user inputs
		    var datatopost = $(this).serializeArray();
		//    console.log(datatopost);
		    //send them to signup.php using AJAX
		    $.ajax({
		        url: "forgot-password.php",
		        type: "POST",
		        data: datatopost,
		        success: function(data){
		            $('#forgotpasswordmessage').html(data);
		        },
		        error: function(){
		            $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
		            
		        }
		    
		    });

		});

      </script>
</body>
</html>