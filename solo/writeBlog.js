//ajax call to save Blog php file_exists
//Once the submit blog form is completed
$("#postform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray(); //make array of objects containing values of signup form
    $.ajax({
        url: "saveBlog.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#submitBlogMessage").html(data);
            }
        },
        error: function(){ 
            $("#submitBlogMessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});