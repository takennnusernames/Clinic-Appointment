<?php


$errorsPatient = array(); 
$username = "";
$email = "";
$f_name = "";
$l_name = "";
$address = "";
$contact = "";
$_SESSION['success'] = "";
$register = 0;

if(isset($_POST['submit'])){

    include_once 'server.inc.php';

    

    $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    if (empty($f_name)) { array_push($errorsPatient, "Firstname is required"); }
    if (empty($l_name)) { array_push($errorsPatient, "Lastname is required"); }
    if (empty($address)) { array_push($errorsPatient, "Address is required"); }
    if (empty($contact)) { array_push($errorsPatient, "Contact is required"); }
    if (empty($gender)) { array_push($errorsPatient, "Must select gender"); }
    if (empty($username)) { array_push($errorsPatient, "Username is required"); }
    if (empty($email)) { array_push($errorsPatient, "Email is required"); }
    if (empty($password)) { array_push($errorsPatient, "Password is required"); }
    if (empty($password2)) { array_push($errorsPatient, "Confirm Password is required"); }

    if(strlen($username) > 16){
        array_push($errorsPatient, "Username is too long");
    }
	$userCheck = mysqli_query($conn, "SELECT * FROM patient WHERE username='$username'");
    if(mysqli_num_rows($userCheck) == 1) { array_push($errorsPatient, "Username already taken"); }

	$emailCheck = mysqli_query($conn, "SELECT * FROM patient WHERE patient_email='$email'");
    if(mysqli_num_rows($emailCheck) == 1) { array_push($errorsPatient, "Email is already registered"); }

    if (!preg_match("/^[a-zA-Z]*$/", $f_name) || !preg_match("/^[a-zA-Z]*$/", $l_name)) {
	    array_push($errorsPatient,"Name must only contain letters");
	}

    if (!empty($password2) && $password != $password2) {
		array_push($errorsPatient, "The two passwords do not match");
	}

    if (count($errorsPatient) == 0) {
		$hashedPass= password_hash($password, PASSWORD_DEFAULT);
        $fullname = $f_name . " " . $l_name;
        if($gender == 1){ $gender = "Male"; }
        if($gender == 2){ $gender = "Female"; }
        if($gender == 3){ $gender = "LGBTQ"; }
		$query = "INSERT INTO `patient`(`patient_name`, `patient_address`, `patient_contactno`, `patient_sex`, `patient_email`, `username`, `password`)
                    VALUES ('$fullname','$address','$contact','$gender','$email','$username','$hashedPass')";
		mysqli_query($conn, $query);
        
		?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Successfully Registered</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
	}

}

?>