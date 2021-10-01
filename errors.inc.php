<?php include('register.inc.php') ?>
	<?php  if (count($errorsPatient) > 0) : ?>
		<div class="error">
			<?php foreach ($errorsPatient as $error) : ?>
				<p><?php echo $error ?></p>
			<?php endforeach ?>
		</div>
	<?php  endif ?>