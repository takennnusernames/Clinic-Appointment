<?php include('login.inc.php') ?>
	<?php  if (count($errorsLogin) > 0) { 
		if(isset($_POST['login'])){ ?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			<?php foreach ($errorsLogin as $error) : ?>
				<p><?php echo "Login error: " . $error ?></p>
			<?php endforeach;
			}	
			?>
		</div>
	<?php  } ?>