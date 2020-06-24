<?php
session_start();
include_once('config.php');

if(isset($_POST['submit']))
{
$doctorid=$_POST['doctor'];
$userid=$_SESSION['id'];
$fees=$_POST['fees'];
$appdate=$_POST['appdate'];
$time=$_POST['apptime'];
$completed='N';
$userstatus='1';
$doctorstatus='1';
$query=mysqli_query($con,"insert into appointment(pid,did,consultancyFees,appointment_date,appointment_time,completed,userstatus,doctorstatus) values('$userid','$doctorid','$fees','$appdate','$time','$completed','$userstatus','$doctorstatus')");
	if($query)
	{
		echo "<script>alert('Your appointment successfully booked');</script>";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient  | Book Appointment</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<script>
function getdoctor(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>	


<script type="text/javascript">
function getfee(val) {

	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'doctor='+val,
	success: function(data){
		$("#fees").html(data);
	}
	});

	$.ajax({
	async: false,
	type: "POST",
	url: "get_doctor.php",
	data:'doctor_set='+val,
	success: function(data){
	}
	});

}

function valid()
{
	var diff=checkDate();
	if(diff>=0)
	{
		return true;
	}
	else
	{
		document.getElementById('date_error').innerHTML = 'Please select current or Future date for appointment !!';
		return false;
	}
}

var count_ret;
function checkDate() {
	jQuery.ajax({
		async: false,
		url: "get_doctor.php",
		data:'date='+$("#appdate").val(),
		type: "POST",
		success:function(data){
			count_ret=data;
		},
		error:function (){}
	});
	return count_ret;
}

function getTime(val)
{	
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'date_time='+val,
	success: function(data){
		$("#apptime").html(data);
	}
	});
}

</script>	




	</head>
	<body>
		<div id="app">		

			<div class="app-content">
			
				<?php include('include/header_patient.php');?>
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Patient | Book Appointment</h1>
								</div>
								
						</section>
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Book Appointment</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
						<form role="form" name="book" method="post" onSubmit="return valid();">
														

						<div class="form-group">
							<label for="DoctorSpecialization">
								Doctor Specialization
							</label>
							<select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
									<option value="">Select Specialization</option>
									<?php $ret=mysqli_query($con,"select distinct specialization from doctor");
									while($row=mysqli_fetch_array($ret))
									{
									?>
											<option value="<?php echo htmlentities($row['specialization']);?>">
												<?php echo htmlentities($row['specialization']);?>
											</option>
											<?php } ?>
																
							</select>
						</div>




														<div class="form-group">
															<label for="doctor">
																Doctors
															</label>
						<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
						<option value="">Select Doctor</option>
						</select>
								
														</div>

														



														<div class="form-group">
															<label for="consultancyfees">
																Consultancy Fees
															</label>
													<select name="fees" class="form-control" id="fees" readonly>
														
														</select>
														</div>
														
														<div class="form-group">
															<label for="AppointmentDate">
																Date
															</label>
									<input class="form-control datepicker" id="appdate" name="appdate"  onChange="getTime(this.value);" required="required" data-date-format="yyyy-mm-dd">
														<span class="error" span style="color:red"><p id="date_error"></p></span>
	
														</div>
														
											<div class="form-group">
															<label for="Appointmenttime">
														
														Time
													
															</label>
									<select name="apptime" class="form-control" id="apptime" required="required"></select>eg : 10:00 AM
														</div>														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									
									</div>
								</div>
					</div>
				</div>
			</div>
			
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});

			$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-d'
});
        </script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>
