<?php

if(isset($_POST['confirm'])){
    
    $date = mysqli_real_escape_string($conn, $_POST['date']);
	$time = mysqli_real_escape_string($conn, $_POST['time']);
	$doctorId = mysqli_real_escape_string($conn, $_POST['doctor']);
	$patient = mysqli_real_escape_string($conn, $_SESSION['id']);

    $sql = "UPDATE `appointments` SET `reason`='cancelled' 
    WHERE `patient_id`='$patient' AND `doctor_id`='$doctorId' AND `appt_date`='$date' AND `appt_time` = '$time'";
    mysqli_query($conn, $sql);
    ?>
    

<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Appointment Cancellation Successful</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
}

?>