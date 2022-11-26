$(document).ready(function () {
  var id = "";
  //getting id from the url
  const geturl = new URLSearchParams(window.location.search);
  id = geturl.get("id");

  //checking if id is not null
  if (id != null) {
    $("#blogId").val(id);
    $.ajax({
      type: "POST",
      url: "../../controllers/blogController.php",
      data: { id: id, action: "getBlogDataById" },
      dataType: "json",
      success: function (blogs) {
        //displaying that particular blog using id
        $("#blogTitle").val(blogs.blog_title);
        $("#blogContent").val(blogs.blog_content);
      },
    });
    //when the form is submitted then updating that paricular blog
    $(document).on("submit", "#updateBlogForm", function (e) {
      e.preventDefault();
      var data = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "../../controllers/blogController.php",
        data: data,
        success: function (res) {
            if(res != "error")
            location.replace("../../views/user/userBlogs.php");
            else
            location.reload();
        },
      });
    });
  } else {
    location.replace("../index.php");
  }
});
