<?php

include_once('config.php');
$name="";
$time="";
session_start();
$date=$_SESSION['date'];

if(isset($_POST['book-appointment']))
{
    $name=$_POST['name'];
    $time=$_POST['time'];
    $status="Confirmed";

}

$query = mysqli_query($con, "insert into appointment(Name, Date, Time, Status) 
              values('$name', '$date', '$time','$status')");
    if($query)
    {
        echo "<script>alert('Your appointment has been successfully booked..!!');</script>";
        session_start();
        $_SESSION['Name'] = $name;
        $_SESSION['success'] = "Your appointment has been successfully booked..!!";
        echo "<script> document.location.href= 'index.php' </script>";
    }


?>