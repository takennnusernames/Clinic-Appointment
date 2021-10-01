<?php 

$errorsLogin = array();

if (isset($_POST['login'])) 
{
	include 'server.inc.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


	if (empty($username)) { array_push($errorsLogin, "Username is required");}
	if (empty($password)) { array_push($errorsLogin, "Password is required");}

	$query = "SELECT * FROM patient WHERE username='$username'";
	$result = mysqli_query($conn, $query);
	$resultCheck = mysqli_num_rows($result);
	
	
	
	if (empty($errorsLogin)){
		if ($resultCheck < 1) {
			array_push($errorsLogin, "Username not recognized");
		}
		if ($row = mysqli_fetch_assoc($result)) {
			//De-hashing the password
				$hashedPassCheck = password_verify($password, $row['password']);
				if ($hashedPassCheck == false) {
					array_push($errorsLogin, "Incorrect Password");
				}
				elseif ($hashedPassCheck == true) 
				{
					//Login the user here
					$_SESSION['username'] = $row['username'];
					$_SESSION['id'] = $row['patient_id'];
					header("Location: index.php");
					exit();
				}
			}
	}

}?>	