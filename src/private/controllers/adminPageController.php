<?php
session_start();
require_once '../config/config.php';
$obj = new User();
if(!isset($_POST['action'])){
    //getting all the users
    $user = User::find('all');
    $arr = [];
    foreach ($user as $key => $value) {
        $obj = array("id"=>$value->id, "name"=> $value->name, "email"=> $value->email, "approved"=> $value->approved, "type"=> $value->type);
        array_push($arr, $obj);
    }
    $_SESSION['allUsers'] = $arr;
    header("Location:../views/admin/userPermission.php");
} else if($_POST['action'] == "inactive"){
    //changing status to inactive
    $id = $_POST['id'];
    $user = User::find_by_id($id);
    $user->approved = 0;
    $user->save();

} else if($_POST['action'] == "active"){
    //changing status to active
    $id = $_POST['id'];
    $user = User::find_by_id($id);
    $user->approved = 1;
    $user->save();
}