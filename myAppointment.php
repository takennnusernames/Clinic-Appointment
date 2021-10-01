
<?php 

$url = "myAppointment.php";
$date = "";
$time = "";
include_once 'header.php';

?>
<body>
  <table>
		<tr>
			<th>Doctor</th>
			<th>Location</th>
      <th>Schedule</th>
      <th>Reason</th>
      <th></th>
		</tr>
        <?php
            include_once 'server.inc.php';
            if(isset($_POST['confirm'])){
                include('cancelAppointment.inc.php');
              }
            $id = $_SESSION['id'];
            $query = "SELECT * FROM appointments JOIN doctor WHERE appointments.doctor_id = doctor.doctor_id AND appointments.patient_id = '$id'";
            $results = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($results);
            foreach ($results as $result) :
                include('cancelAppointment.form.php'); 
            endforeach ?>
	</table>
</body>
</html>