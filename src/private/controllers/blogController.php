<?php
session_start();
require_once '../config/config.php';
$obj = new Blog();
if($_POST['action'] == "addBlog"){
    //getting all the information from the POST
    $title = $_POST['blogTitle'];
    $content = $_POST['blogContent'];
    $id = $_SESSION['user']['id'];
    //checking if fields are not empty 
    if ($title != "" && $content != "") {
        $blog = blog::create(array('blog_title' => $title, 'blog_content' => $content, 'user_id'=> $id, 'date'=> date('Y-m-d')));
    } else {
        $_SESSION['errors'] = "fields cannot be empty";
        echo "error";
        header("Location:../views/user/userBlogs.php");
    }
} else if($_POST['action'] == "deleteBlog"){
    $blog_id = $_POST['id'];
    $blog = Blog::find_by_id($blog_id);
    //deleting the selected blog
    $blog->delete();
} elseif ($_POST['action'] == 'getBlogDataById') {
    $blog_id = $_POST['id'];
    //getting blog by id
    $blog = Blog::find_by_id($blog_id);
    $arr = array("blog_title"=>$blog->blog_title, "blog_content"=>$blog->blog_content);
    echo json_encode($arr);
} elseif($_POST['action'] == "updateBlog"){
    $title = $_POST['blogTitle'];
    $content = $_POST['blogContent'];
    $blog_id = $_POST['id']; 
    //updating blog if fields are not empty
    if ($title != "" && $content != "") {
        $blog = Blog::find_by_id($blog_id);
        $blog->blog_title = $title;
        $blog->blog_content = $content;
        $blog->save();
    } else {
        $_SESSION['errors'] = "fields cannot be empty";
        echo "error";
    }

}
