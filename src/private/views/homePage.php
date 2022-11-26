<?php
session_start();
if(!isset($_SESSION['allBlogs'])){
  header("Location:../controllers/homePageController.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>HOME PAGE</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./homePage.php">Blogs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./homePage.php">Home</a>
        </li>
        <?php if(isset($_SESSION['user'])){?>
          <li class="nav-item">
            <a class="nav-link" href="<?php
            if($_SESSION['user']['type'] == "user")
              echo "./user/userBlogs.php";
            else
            echo "./admin/adminHome.php";
            ?>
            ">My Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./loggout.php">Log Out</a>
          </li>
        <?php } else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="./login/index.php">Sign in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./registration/index.php">Sign Up</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<div class="d-flex justify-content-center">
          <h1>All Blogs</h1>
</div>
<!-- displaying the blogs in this div -->
<div class="container">
        <div class="row p-md-5 p-2 border border-1">
            <?php
            $flag = 0;
            //checking if data is in session storage
            if(isset($_SESSION['allBlogs'])){
                $str = "";
                $blogs = ($_SESSION['allBlogs']);
                foreach ($blogs as $value) {
                  if($value['user_id'] == $_SESSION['user']['id'] || $_SESSION['user']['type'] == "admin"){
                    $flag = 1;
                    $str .= '<div class="col-lg-6 col-12 border border-1">
                            <div class="row">
                            <div class="col-sm-8">
                            <h4 class="d-inline">'.$value['blog_title'].'</h4>
                            </div>
                            <div class="col-sm-4">
                            <a href="'; 
                            if($_SESSION['user']['type'] == 'admin'){
                              $str .= './admin/updateBlog.php?id='.$value['id'].'';
                            }else{
                              $str .= './user/updateBlog.php?id='.$value['id'].'';
                            }
                       $str .= ' "><button id="'.$value['id'].'" class="btn btn-primary editbtn">Edit</button></a>
                            <button id="'.$value['id'].'" class="btn btn-danger deletebtn">Delete</button>
                            </div>
                            </div>
                
                            <p>'.$value['blog_content'].'</p>
                            <p>Blog by: '.$value['name'].'</p>
                            <p>Date: '.$value['date'].'</p>
                        </div>';
                  } else{
                    $flag = 1;
                    $str .= '<div class="col-lg-6 col-12 border border-1">
                            <div class="row">
                            <div class="col-sm-8">
                            <h4 class="d-inline">'.$value['blog_title'].'</h4>
                            </div>
                            <div class="col-sm-4">
                            
                            </div>
                            </div>
                
                            <p>'.$value['blog_content'].'</p>
                            <p>Blog by: '.$value['name'].'</p>
                            <p>Date: '.$value['date'].'</p>
                        </div>';
                  }
                }
                echo $str;
                unset($_SESSION['allBlogs']);
            } 
            if($flag == 0){
              echo "No Blogs";
            }
            ?>   
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="../../public/js/homePage.js"></script>
</html>