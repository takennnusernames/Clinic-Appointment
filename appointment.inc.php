<?php 

$errors = array();
$result = array();
if (isset($_POST['set'])) 
{
	include 'server.inc.php';

	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$time = mysqli_real_escape_string($conn, $_POST['time']);
	$doctorId = mysqli_real_escape_string($conn, $_POST['dId']);
	$reason = mysqli_real_escape_string($conn, $_POST['reason']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);
	$patientId = mysqli_real_escape_string($conn, $_SESSION['id']);

	$sql = "INSERT INTO `appointments`( `doctor_id`, `patient_id`, `appt_date`, `appt_time`, `location`, `reason`) 
			VALUES ('$doctorId','$patientId','$date','$time','$location','$reason')";
	mysqli_query($conn, $sql);		
	?>
	
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Appointment Set Successfully</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
	} ?>