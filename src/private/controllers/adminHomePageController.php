<?php
session_start();
require_once '../config/config.php';
$obj = new User();
$obj1 = new Blog();
//getting latest 5 users and blogs
$user = User::all(array("limit" => 5, "order" => "id DESC"));
$join = 'SELECT `blogs`.*, `users`.name, `users`.type FROM `blogs` Inner JOIN `users` ON(blogs.user_id = users.id) ORDER BY date DESC, blogs.id DESC Limit 5';
$blogs = Blog::find_by_sql($join);
$arr = [];
foreach ($user as $key => $value) {
    $obj = array("id" => $value->id, "name" => $value->name, "email" => $value->email, "approved" => $value->approved, "type" => $value->type);
    array_push($arr, $obj);
}
//storing data in session
$_SESSION['latestUsers'] = $arr;
$arr = [];
foreach ($blogs as $key => $value) {
    $obj = array("id" => $value->id, "blog_title" => $value->blog_title, "blog_content" => $value->blog_content, "user_id" => $value->user_id, "date" => $value->date, "name" => $value->name, "type" => $value->type);
    array_push($arr, $obj);
}
//storing data in session
$_SESSION['latestBlogs'] = $arr;
//redirecting the page back
header("Location:../views/admin/adminHome.php");
