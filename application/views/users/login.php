<div id="login_form">
	<?php echo form_open(base_url()); ?>
		<ul>
			<li>
		    	<?php echo validation_errors(); ?>
		    </li>
			<li>
		    	<label>Email</label>
		        <div>
					<?php echo form_input(array('id'=>'email', 'name'=>'email')); ?>
				</div>
		    </li>
		    <li>
		    	<label>Password</label>
		        <div>
					<?php echo form_password(array('id'=>'password', 'name'=>'password')); ?>
				</div>
		    </li>
		    <li>
		    	<?php echo form_submit(array('name'=>'submit'), 'Login'); ?>
		    </li>
		</ul>
	<?php echo form_close(); ?>
</div>