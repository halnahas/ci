<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login Form</title>

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
		padding: 14px 15px 10px 0px;
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

	div#login_form {
		width:380px;
		margin:0px auto;
		border:1px solid;
		padding:10px;
	}
	</style>
</head>
</body>
</html>

<div id='login_form'>
<h1>Please login</h1>
<p>Use the form below to login</p>


<?php echo form_open(base_url().'user/login');?>

<ul>
	<li>
		<label>Username</label>
		<div>
		<?php echo form_input(array('id'=>'username','name'=>'username'));?>
		</div>
	</li>
	
	<li>
		<label>Password</label>
		<div>
		<?php echo form_password(array('id'=>'password','name'=>'password'));?>
		</div>
	</li>

	<li>
		<?php 
		if ($this->session->flashdata('login_error'))
			echo "You entered an incorrect Username or Password";
		echo validation_errors(); ?>
	</li>

	<li><?php echo form_submit(array('name'=>'submit'), 'Login') ;?></li>

</ul>

<?php echo form_close();?>
