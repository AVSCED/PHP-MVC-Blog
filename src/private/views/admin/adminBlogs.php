<?php
session_start();
//not allowing anyone on this page if any user is not logged in
if(!$_SESSION['user']){
  header("Location:../login/index.php");
} else{
  //if admin is logged in then page will redirect to admins portal
  if($_SESSION['user']['type'] == 'user'){
    header("Location:../user/userBlogs.php");
  } 
}
if(!isset($_SESSION['blogs'])){
  header("Location:../../controllers/userPageController.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../../public/js/script.js"></script>
    <title>Hello <?php echo $_SESSION['user']['name']; ?>!</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../homePage.php">All Blogs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="./adminHome.php">Admin Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-dark " href="../admin/adminBlogs.php">Admin Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../admin/userPermission.php">All Users</a>
        </li>
        <li class="nav-item">
        <a class="nav-link " href="../loggout.php">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php 
if(isset($_SESSION['errors'])){
  echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errors'] . '</div>';
  unset($_SESSION['errors']);
} 
?>
    <!-- form to add a new blog -->

    <div class="container border border-1">
      <h1>Add Blog</h1>
      <form id="addBlogForm" class="mx-1 mx-md-4">
        <div class="mb-3">
          <input type="hidden" name="action" value="addBlog">
          <label for="blogTitle" class="form-label">Blog Title</label>
          <input type="text" name="blogTitle" class="form-control" maxlength="100" id="blogTitle" placeholder="Title here">
        </div>
        <div class="mb-3">
          <label for="blogContent" class="form-label">Blog Content</label>
          <textarea class="form-control" name="blogContent" maxlength="500" placeholder="Blog content here"  id="blogContent" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Add blog</button>
        </div>
      </form>
    </div>
    
    <!-- displaying the blogs in this div -->
    <div class="container">
        <div class="row p-md-5 p-2 border border-1">
            <?php
            $flag = 0;
            if(isset($_SESSION['blogs'])){
                $str = "";
                $blogs = ($_SESSION['blogs']);
                foreach ($blogs as $value) {
                  if($value['user_id'] == $_SESSION['user']['id']){
                    $flag = 1;
                    $str .= '<div class="col-lg-6 col-12 border border-1">
                            <div class="row">
                            <div class="col-sm-8">
                            <h4 class="d-inline">'.$value['blog_title'].'</h4>
                            </div>
                            <div class="col-sm-4">
                            <a href="./updateBlog.php?id='.$value['id'].'"><button id="'.$value['id'].'" class="btn btn-primary editbtn">Edit</button></a>
                            <button id="'.$value['id'].'" class="btn btn-danger deletebtn">Delete</button>
                            </div>
                            </div>
                
                            <p>'.$value['blog_content'].'</p>
                            <p>Blog by: '.$value['name'].'</p>
                            <p>Date: '.$value['date'].'</p>
                        </div>';
                  }
                }
                echo $str;
                unset($_SESSION['blogs']);
            } 
            if($flag == 0){
              echo "No Blogs";
            }
            ?>   
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>