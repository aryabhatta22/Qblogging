<!DOCTYPE html>
<html>
<head>
	<title>Create an account</title>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>

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
			margin: 0px;
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
		  height: 580px;
		  padding: 20px 40px;
		  border-radius: 10px;
		  position: absolute;
		  left: 50%;
		  top: 50%;
		  transform: translate(-50%,-50%);
		}

		.login-form h1
		{
		  text-align: center;
		  margin-bottom: 60px;
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
	<form action="index.html" class="login-form">
        <h1>Sign Up</h1>
        <div class="radio-btn">
	        <input type="radio" name="profession" value="student"> Student &nbsp&nbsp&nbsp&nbsp
			<input type="radio" name="profession" value="faculty"> Faculty
		</div>
        <div class="txtb">
          <input type="text">
          <span data-placeholder="User ID"></span>
        </div>

        <div class="txtb">
          <input type="email">
          <span data-placeholder="Email"></span>
        </div>

        <div class="txtb">
          <input type="password">
          <span data-placeholder="Password"></span>
        </div>

        <input type="submit" class="logbtn" value="Signup">

        <div class="bottom-text">
          <h4> Already have an account? </h4> 
        </div>
        <div class="container">
          <input type="submit" class="signbtn" value="Login">
          <input type="submit" class="signbtn" value="Cancel">

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

      </script>
</body>
</html>