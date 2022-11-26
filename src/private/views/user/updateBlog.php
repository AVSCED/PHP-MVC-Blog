<?php
session_start();
//checking is someone is logged in or not
if(!$_SESSION['user'])
header("Location:./login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- displaying logged in users name in title -->
    <title>Hello <?php echo $_SESSION['user']['name']; ?>!</title>
</head>

<body>
  <!-- navbar here -->
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Blogs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../homePage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-dark " href="../user/userBlogs.php">My Blogs</a>
        </li>
        <li class="nav-item">
        <a class="nav-link " href="../loggout.php">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php 
//checking for errors
if(isset($_SESSION['errors'])){
  echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errors'] . '</div>';
  unset($_SESSION['errors']);
} 
?>
    <!-- form for updating the blog -->
    <div class="container border border-1">
      <h1>Update Blog</h1>
      <form id="updateBlogForm" class="mx-1 mx-md-4">
        <input type="hidden" name="id" id="blogId">
        <input type="hidden" name="action" value="updateBlog">
        <div class="mb-3">
          <label for="blogTitle" class="form-label">Blog Title</label>
          <input type="text" name="blogTitle" class="form-control" maxlength="100" id="blogTitle" placeholder="Title here">
        </div>
        <div class="mb-3">
          <label for="blogContent" class="form-label">Blog Content</label>
          <textarea class="form-control" name="blogContent" maxlength="500" placeholder="Blog content here XD"  id="blogContent" rows="3"></textarea>
        </div>
        <div class="mb-3">
            
            <button type="submit" class="btn btn-primary">Update blog</button>
            
        </div>
      </form>
    </div>
    
   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="../../../public/js/editBlogs.js"></script>
</html>