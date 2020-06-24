<?php

include_once('config.php');
$name="";
$email="";
$phno="";
$password="";
if(isset($_POST['reg_user']))
{

      $name = $_POST['name'];
      $email = $_POST['email'];
      $phno = $_POST['phno'];
      $password = $_POST['password'];
}

    $query = mysqli_query($con, "insert into user_details(Name, Email, Phno,Password) 
              values('$name', '$email', '$phno','$password')");
    if($query)
    {
        echo "<script>alert('Registered Successfully');</script>";
        session_start();
        $_SESSION['Name'] = $name;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
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
    <link rel="stylesheet" href="styles-signup.css">
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

                <li class="nav-item active"><a class="nav-link" href="signup.html"><span class="fa fa-list fa-lg"></span> Sign Up</a></li>

                <li class="nav-item"><a class="nav-link" href="admin_login.php"><span class="fa fa-address-card fa-lg"></span> login as admin</a></li>
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





<div class="container d-flex justify-content-center">
    <div class="row my-5">
        <div class="col-md-6 text-left text-white lcol">
            <div class="greeting">
                <h3>Welcome to <span class="txt">We Arrange</span></h3>
            </div>
            <h6 class="mt-3">let's get you timed up...</h6>
            
        </div>
        <div class="col-md-6 rcol">
            <form class="sign-up" method="post">

                <h2 class="heading mb-4">Sign up</h2>    

                <div class="row"><span id="name_error"></span></div>
                <div class="form-group fone mt-2"> <i class="fa fa-user"></i> <input type="name" class="form-control" placeholder="Name" name="name"> </div>

                <div class="row"><span id="email_error"></span></div>
                <div class="form-group fone mt-2"> <i class="fa fa-envelope"></i> <input type="email" class="form-control" placeholder ="Work email" name="email"> </div>

                <div class="row"><span id="phno_error"></span></div>
                <div class="form-group fone mt-2"> <i class="fa fa-phone"></i> <input type="text" class="form-control" placeholder=" Contact Number" name="phno"></div>

                <div class="row"><span id="password_error"></span></div>
                <div class="form-group fone mt-2"> <i class="fa fa-lock"></i> <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="image"><i class="fa fa-eye"></i></div>
                
                    
                </div> <input type="checkbox" class="form-check-input ml-0" id="exampleCheck1"> <label class="form-check-label ml-3" for="exampleCheck1">I agree to Stoke <u>Terms</u> and <u>Privacy Policy</u></label>
                <button type="submit" class="btn btn-success mt-5" name="reg_user" id="reg_user">Get satrted now</button>
            <p class="exist mt-4">Existing user? <span><a href="login.html">Log in</a></span></p>
            </form> 
        </div>
    </div>
</div>

</body>



</html>
