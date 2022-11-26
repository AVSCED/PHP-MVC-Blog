$(document).ready(function () {
     //delete button for logged in user
     $(document).on('click','.deletebtn', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to delete the blog")){
        $.ajax({
            type: "POST",
            url: "../controllers/blogController.php",
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
        url: "../controllers/homePageController.php",
        success: function (response) {
            
        }
    });
}