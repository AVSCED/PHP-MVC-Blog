$(document).ready(function () {
    
    displayBlogs();

    $(document).on('submit', '#addBlogForm' ,function (e) { 
        e.preventDefault();
        //getting all the data of the form
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "../../controllers/blogController.php",
            data: data,
            success: function (res) {
                displayBlogs();
                location.reload();
            }
        });
    });

     //delete button for logged in user
     $(document).on('click','.deletebtn', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to delete the blog")){
        $.ajax({
            type: "POST",
            url: "../../controllers/blogController.php",
            data: {id : id, action : "deleteBlog"},
            success: function (response) {
                displayBlogs();
                location.reload();
            }
        });
    }
       
    });
});

function displayBlogs(){
    $.ajax({
        type: "POST",
        url: "../../controllers/userPageController.php",
        data: "data",
        success: function (response) {
            
        }
    });
}