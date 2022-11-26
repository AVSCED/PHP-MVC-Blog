<?php
session_start();
require_once '../config/config.php';
$obj = new Blog();
$join = 'SELECT `blogs`.*, `users`.name, `users`.type FROM `blogs` Inner JOIN `users` ON(blogs.user_id = users.id) ORDER BY date DESC, blogs.id DESC';
$blogs = Blog::find_by_sql($join);
$arr = [];
foreach ($blogs as $key => $value) {
    $obj = array("id" => $value->id, "blog_title" => $value->blog_title, "blog_content" => $value->blog_content, "user_id" => $value->user_id, "date" => $value->date, "name" => $value->name, "type" => $value->type);
    array_push($arr, $obj);
}
$_SESSION['allBlogs'] = $arr;

header("Location:../views/homePage.php");
