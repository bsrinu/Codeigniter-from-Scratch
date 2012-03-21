<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<title>Newsletter Signup</title>
		<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" charset="utf-8">
		<!-- <script src="http://code.google.com/jquery-min.js" type="text/javascript"></script> -->
	</head>
	<body>
		<div id="newsletter_form">
			<h2>Signup for the Newsletter</h2>
			<?php echo form_open('email/send'); ?>
				<?php 
				$name_data = array(
					'name' => 'name',
					'id'   => 'name',
					'value' => set_value('name')
				); 
				?>
				<p><label for='name'>Name: </label><?php echo form_input($name_data); ?></p>
				
				<p>
					<label for='email'>Email Address: </label>
					<input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>">
				</p>
				
				<p><?php echo form_submit('submit', 'Submit'); ?></p>
				
				<?php echo form_close(); ?>
				
				<?php echo validation_errors('<p class="error">'); ?>
		</div><!-- div newsletter_form end -->
	</body>
</html>