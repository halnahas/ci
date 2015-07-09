<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 0px 10px 0px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}

	ul {
		list-style:none;
	}
	ul li {
		margin-top:10px;
	}

	div#reg_form {
		width:480px;
		margin:0px auto;
		border:1px solid;
		padding:10px;
	}
	</style>
</head>
</body>
</html>

<div id='reg_form'>
<h1>Please Register</h1>
<p>Use the form below to register</p>


<?php echo form_open(base_url().'user/register');?>

<ul>
	<li>
		<label>Username</label>
		<div>
		<?php echo form_input(array('id'=>'reg_username','name'=>'reg_username', 'value'=>set_value('reg_username')));?>
		</div>
	</li>

	<li>
		<label>Name</label>
		<div>
		<?php echo form_input(array('id'=>'reg_name','name'=>'reg_name', 'value'=>set_value('reg_name')));?>
		</div>
	</li>

	<li>
		<label>Email</label>
		<div>
		<?php echo form_input(array('id'=>'reg_email','name'=>'reg_email', 'value'=>set_value('reg_email')));?>
		</div>
	</li>

	<li>
		<label>Password</label>
		<div>
		<?php echo form_password(array('id'=>'reg_password','name'=>'reg_password', 'value'=>''));?>
		</div>
	</li>

	<li>
		<label>Confirm the Password</label>
		<div>
		<?php echo form_password(array('id'=>'reg_conf_password','name'=>'reg_conf_password', 'value'=>''));?>
		</div>
	</li>

	<li>
		<?php 
		if ($this->session->flashdata('reg_error'))
		{
			echo "Registration error<br>";
		}
		echo validation_errors(); ?>

	</li>

	<li><div><?php echo form_submit(array('name'=>'register'), 'Register') ;?></div></li>
</ul>


<?php echo form_close();?>
