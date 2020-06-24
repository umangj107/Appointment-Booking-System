<?php

include_once('config.php');
$date="";

if(isset($_POST['reg_user']))
{

      $date = $_POST['date'];
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
                <li class="nav-item "><a class="nav-link" href="start.html"><span class="fa fa-home fa-lg"></span> Home</a></li>

                <li class="nav-item active"><a class="nav-link" href="user-book-date.php"><span class="fa fa-info fa-lg"></span> Book appointment</a></li>

                <li class="nav-item"><a class="nav-link" href="start.html"><span class="fa fa-list fa-lg"></span> Logout</a></li>

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
            <form class="sign-up" method="post" action="user-book-appointment.php">

                <h2 class="heading mb-4">Sign up</h2>  

                <div class="form-group fone mt-2"> <i class="fa fa-envelope"></i> <input type="date" class="form-control" placeholder ="Date" name="date" id="date"> </div>



                <button type="submit" class="btn btn-success mt-5" name="book-slot" id="book-slot">Book Slot</button>

                </form>
                </div>
                </div>
                </div>
                </body>
                </html>  

