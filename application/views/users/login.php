<div id="login_form">
	<?php 
		echo form_fieldset('Login');
		echo form_open(base_url());
		echo validation_errors();
		echo '<label>Email</label>';
		echo '<div>'.form_input(array('id'=>'email', 'name'=>'email')).'</div>';
		echo '<label>Password</label>';
		echo '<div>'.form_password(array('id'=>'password', 'name'=>'password')).'</div>';
		echo form_submit(array('name'=>'submit'), 'Login');
		echo form_fieldset_close();
		echo form_close(); 
	?>
</div>