
<?php 

	$url = "index.php";
	include_once 'header.php';
	
?>
<body>
    
    <div class="top">
		<h2>Register</h2>
	</div>
    
	<form id="register" method="POST">	
	
		<?php include('errors.inc.php'); ?>

		
		<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">First Name</label>
		<input name="f_name" value="<?php echo $f_name; ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		</div>
		<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Last Name</label>
		<input name="l_name" value="<?php echo $l_name; ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		</div>
		<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Current Address</label>
		<input name="address" value="<?php echo $address; ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		</div>
		<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Contact Number</label>
		<input name="contact" value="<?php echo $contact; ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		</div>
		<div class="input-group mb-3">
		<label class="input-group-text" for="inputGroupSelect01">Sex</label>
			<select class="form-select" id="inputGroupSelect01" name="gender">
				<option value="">Choose...</option>
				<option value="1">Male</option>
				<option value="2">Female</option>
			</select>
		</div>
		<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Username</label>
		<input name="username" value="<?php echo $username; ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		</div>
		<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Email</label>
		<input name="email" value="<?php echo $email; ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input name="password" type="password" class="form-control" id="exampleInputPassword1">
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Confirm Password</label>
			<input name="password2" type="password" class="form-control" id="exampleInputPassword1">
		</div>
		<div class="d-grid gap-2">
			<button type="submit" name="submit" class="btn btn-primary">Register</button>
		</div>


	</form>

</body>
</html>