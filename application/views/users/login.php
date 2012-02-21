<style type="text/css">
div#login_form {
	width:315px;
	margin:100px auto;
	padding:15px;
	border:solid 1px #ccc;
	background:#fbfbfb;
	font-family:arial;
	font-size:12px;
}
ul{
	list-style:none;
}
ul li{
	margin:15px;
}
ul li label{
	font-family:arial;
	font-size:12px;
	color:#555;
}
ul li input#email, ul li input#password{
	width:205px;
	height:25px;
}
div.title{
	font-size:22px;
	color:#555;
	margin-left:55px;
	margin-right:55px;
	margin-top:20px;
	margin-bottom:20px;
	border-bottom:1px solid #fdfdfd;
}
</style>
<div id="login_form">
	<div class="title">Login</div>
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