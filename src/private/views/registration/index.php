<?php
session_start();
//checking if user is logged in 
if (isset($_SESSION['user']))
  header("Location:../login/success.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Registration</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../homePage.php">Blogs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../homePage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../login/index.php">Sign in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./index.php">Sign Up</a>
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
  <section class="vh-200" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                  <!-- registration form -->
                  <form method="POST" action="../../../private/controllers/registrationController.php" class="mx-1 mx-md-4">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="Uname" id="Uname" class="form-control" />
                        <label class="form-label" for="Uname">Your Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" id="email" class="form-control" />
                        <label class="form-label" for="email">Your Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="pass" id="pass" class="form-control" />
                        <label class="form-label" for="pass">Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="cpass" id="cpass" class="form-control" />
                        <label class="form-label" for="cpass">Repeat your password</label>
                      </div>
                    </div>



                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <p>Already registered?</p>
                      <a href="../../../private/views/login/index.php" class="btn btn-primary ms-3 btn-lg">Login</a>
                    </div>

                  </form>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>