<?php
session_start();
//not allowing anyone on this page if any user is not logged in
if (!$_SESSION['user']) {
  header("Location:../login/index.php");
} else {
  //if admin is logged in then page will redirect to admins portal
  if ($_SESSION['user']['type'] == 'user') {
    header("Location:../user/userBlogs.php");
  }
}

if (!isset($_SESSION['latestBlogs'])) {
  header("Location:../../controllers/adminHomePageController.php");
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
            <a class="nav-link link-dark" href="./adminHome.php">Admin Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="../admin/adminBlogs.php">Admin Blogs</a>
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
  if (isset($_SESSION['errors'])) {
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errors'] . '</div>';
    unset($_SESSION['errors']);
  }
  ?>


  <!-- displaying the blogs in this div -->
  <div class="container">
    <h3>Latest Blogs</h3>
    <a class="btn btn-primary" href="../homePage.php">Show all blogs</a>
    <div class="row  p-2 border border-1">
      <?php
      if (isset($_SESSION['latestBlogs'])) {
        foreach ($_SESSION['latestBlogs'] as $key => $value) {
          $str .= '<div class="col-lg-6 col-12 border border-1">
                            <div class="row">
                            <div class="col-sm-8">
                            <h4 class="d-inline">Title: ' . $value['blog_title'] . '</h4>
                            </div>
                            <div class="col-sm-4">
                            
                            </div>
                            </div>
                
                            <p>Content : ' . $value['blog_content'] . '</p>
                        </div>';
        }
        echo $str;
        unset($_SESSION['latestBlogs']);
      }
      ?>
    </div>
  </div>
  <!-- displaying latest users -->
  <div class="container">
    <h3>Latest Users</h3>
    <a class="btn btn-primary" href="../admin/userPermission.php">Show all users</a>
    <div class="row p-md-5 p-2 border border-1">
      <?php
      if (isset($_SESSION['latestUsers'])) {
        $str = '<table class="table table-striped"><tr><th>ID</th><th>Name</th><th>email</th><th>Current Status</th></tr>';
        $arr = $_SESSION['latestUsers'];

        foreach ($arr as $key => $value) {
          if ($value['type'] == 'user') {
            if ($value['approved'] == 1) {
              $str .= '<tr><td>' . $value['id'] . '</td><td>' . $value['name'] . '</td><td>' . $value['email'] . '</td><td>Active</td></tr>';
            } else {
              $str .= '<tr><td>' . $value['id'] . '</td><td>' . $value['name'] . '</td><td>' . $value['email'] . '</td><td>Inactive</td></tr>';
            }
          }
        }
        $str .= "</table>";
        unset($_SESSION['latestUsers']);
        echo $str;
      } else {
        echo "No Users";
      }
      ?>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>