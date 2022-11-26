<?php
session_start();
//checking if post is set or not
if (isset($_POST)) {
    //extracting values
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if ($email != "" && $pass != "") {
        //checking if fields are empty or not           
        require_once '../config/config.php';
        //creating object of users class
        $obj = new User();
        $user = User::all(array('conditions' => array('email = ? AND pass = ?', $email, $pass)));
        if(empty($user)){
            $_SESSION['errors'] = "Email Password doesn't match";
            header("Location:../views/login/index.php");
        }else{
        if($user[0]->approved == 1){
            $_SESSION['user'] = array("id" => $user[0]->id, "name" => $user[0]->name, "email" => $user[0]->email, "pass" => $user[0]->pass, "approved" => $user[0]->approved, "type" => $user[0]->type); 
            if($user[0]->type == "admin"){
                header("Location:../views/homePage.php");
            }else{
                header("Location:../views/homePage.php");
            }
        } else{
            $_SESSION['errors'] = "User Not approved by admin";
            header("Location:../views/login/index.php");
        }
        }
    } else {
        $_SESSION['errors'] = "Fields cannot be empty";
        header("Location:../views/login/index.php");
    }
}
