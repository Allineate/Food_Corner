<div id="login_form">

	<?php echo base_url(); ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?> css/style.css"/>
	
	<?php if (isset($account_created)) { ?>
		<h3><?php echo $account_created; ?></h3>
	<?php } else { ?>
		<h1>Login</h1>
	<?php } ?>
	
	<?php
		echo form_open('login/validate_credentials');
		echo form_input('username', 'Username');
		echo form_password('password', 'Password');
		echo form_submit('submit', 'Login');
		echo anchor ('login/signup', 'Create Account');
	?>
</div>