<div id="register_form">
	<?php echo base_url(); ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?> css/style.css"/>
	<h1>Create Account</h1>


		<legend>Personal Information</legend>
		</br>
		<?php
		echo form_open('login/create_member');
		echo form_input('first_name', set_value('first_name', 'First Name'));
		echo form_input('middle_name', set_value('middle_name', 'Middle Name'));
		echo form_input('last_name', set_value('last_name', 'Last Name'));
		echo form_input('email', set_value('email', 'E-Mail'));
		?>

		<legend>Login Information</legend>
		</br>
		<?php
		echo form_input('username', set_value('username', 'Username'));
		echo form_password('password', '', 'placeholder="Password"', 'class="password"');
		echo form_password('password_confirm', '', 'placeholder="Confirm Password"', 'class="password"');
		echo form_submit('submit', 'Create Account');
		?>
		<?php echo validation_errors('<p class="error">'); ?>

</div>