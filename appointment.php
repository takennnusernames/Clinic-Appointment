
<?php 

$url = "appointment.php";
$date = "";
$time = "";
include_once 'header.php';

?>
<body>
  <center>
  <?php
      if(isset($_POST['check'])){
        $date = $_POST['date'];
        $time = $_POST['time'];
      }
      if(isset($_POST['set'])){
        include('appointment.inc.php');
      }
      ?>
  <form method="post">
    <input type="date" name="date" id="date" value="<?php echo $date ?>">
    <input type="time" min="08:00" max="18:00" step="1800" name="time" id="time" value="<?php echo $time ?>">
    <input type="submit" value="Check Date" name="check">
  </form>
  </center>
  <table>
		<tr>
			<th>Doctor</th>
			<th colspan="2">Location</th>
      <th>Availability</th>
		</tr>
			<?php
				include_once 'server.inc.php';
				$query = "SELECT * FROM doctor";
				$results = mysqli_query($conn, $query);
				$resultCheck = mysqli_num_rows($results);
				foreach ($results as $result) :
          include('doctorAvailability.form.php');  
				endforeach ?>
	</table>
</body>
</html>