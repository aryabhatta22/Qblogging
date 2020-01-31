<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
  <div class="well">

      <form method="post" id="postform">
          <!--      div to show messages-->
          <div id="submitBlogMessage"></div>
          <div class="input-group">
            <span class="input-group-addon input-lg" id="inputlg">Title</span>
            <input id="title" type="text" class="form-control input-lg form-group-lg" name="title" >
          </div>
          <br>
          <div class="form-group">
            <span class="form-group-addon input-lg" id="inputlg">Write Blog</span>
            <textarea class="form-control input-lg" id="data" name="data" rows="8"></textarea>
          </div>
          <br>
          <div class="form-group">
            <span class="form-group-addon input-lg" id="inputlg">Private Key</span>
            <textarea class="form-control input-lg" id="privateKey" name="privateKey" rows="5"></textarea>
          </div>
          <br>
<!--            <button type="button" class="btn btn-primary pull-right" id="submitBlog">Create Blog</button>-->
          
           <input class="btn btn-primary pull-right" name="post" type="submit" value="Create Blog">
            <a href="index.php" class="btn btn-danger">Cancel</a>
          <br>
          <br>
      </form>
 </div>
    <script src="writeBlog.js"></script>
</body>
</html>

