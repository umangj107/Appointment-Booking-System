<?php

include_once('config.php');
$username="";
$password="";
if(isset($_POST['login_admin']))
{

      $username = $_POST['username'];
      $password = $_POST['password'];

        if (empty($username)) {
            echo '<script>alert("Username cannot be empty")</script>'; 
  
            }
        if (empty($password)) {
            echo '<script>alert("Password cannot be empty")</script>'; 
  
            }

        
        $query = "select * from admin_details where username='$username' AND password='$password'";
        $results = mysqli_query($con, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          session_start();
          header('location: admin.php');
        }else {
            echo '<script>alert("Invalid credentials")</script>';
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social-css">


    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="styles-login.css">
    <title>We Arrange</title>
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>


            <a class="navbar-brand mr-auto" href="start.html">We Arrange</a>

            <div class="collapse navbar-collapse" id="Navbar">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="start.html"><span class="fa fa-home fa-lg"></span> Home</a></li>

                <li class="nav-item"><a class="nav-link" href="login.php"><span class="fa fa-info fa-lg"></span> Login as user</a></li>

                <li class="nav-item"><a class="nav-link" href="signup.html"><span class="fa fa-list fa-lg"></span> Sign Up</a></li>

                <li class="nav-item active"><a class="nav-link" href="admin_login.php"><span class="fa fa-address-card fa-lg"></span> login as admin</a></li>
            </ul>
        </div>

        </div>
    </nav>

    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-6">
                    <h1>We Arrange</h1>
                    <p>We help you schedule your day and schedule meetings and appointments according to your free time.
                    We do not compain ! We do not cause errors..!!</p>
                </div>
                <div class="col-12 col-sm">
                </div>
            </div>
        </div>
    </header>

   <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto py-4 px-0">
            <div class="card p-0">
                <div class="card-title text-center">
                    <h5 class="mt-5">HEY, THERE</h5> <small class="para">Login to your cool account below.</small>
                </div>
                <form class="signup" method="post" >
                    <div class="form-group"><input type="text" class="form-control" placeholder="username" name="username"></div>
                    <div class="form-group"><input type="password" class="form-control" placeholder="password" name="password"></div> <button type="submit" class="btn btn-login btn-primary" name="login_admin" id="login_admin">Login</button>

                    <div class="row"></div>
                </form>
            </div>
        </div>
    </div>
</div>




 

</body>
<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</html>