<?php
include_once('config.php');
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
    <title>We Arrange</title>
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>


            <a class="navbar-brand mr-auto" href="#">We Arrange</a>

            <div class="collapse navbar-collapse" id="Navbar">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item "><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span> Home</a></li>

                <li class="nav-item active"><a class="nav-link" href="manage.php"><span class="fa fa-list fa-lg"></span> Display today's appointments</a></li>

                <li class="nav-item"><a class="nav-link" href="admin_logout.php"><span class="fa fa-address-card fa-lg"></span> Logout</a></li>
            </ul>
        </div>

        </div>
    </nav>




    <form id="insert" method="post">
        <?php
        $sql = "Select * from appointment where Date = CURRENT_DATE()";
        $result = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
           echo $row["A_id"];
           echo "<br>";
                  echo $row["Name"];
                  echo "<br>";
                  echo $row["Date"];
                  echo "<br>";
                  echo $row["Time"];
                  echo "<br>";
                  echo $row["Status"];
                  echo "<br><br>";
        }


   ?>
        
        
    </form>

    </body>
<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</html>