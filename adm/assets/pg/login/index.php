<?php
error_reporting(0); 
session_start();
if($_SESSION['id']<>'') header('Location: ../../../../adm/main');
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  
      <link rel="stylesheet" href="css/style.css">
  
</head>

<body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login Admin</h1>
			</div>

			<form class="login-form" action="login.php" method="post">
				<div class="control-group">
				<input type="text" class="login-field" required name="user" value="" maxlength="8" placeholder="Id Admin" id="login-name">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" required value="" name="pass" placeholder="Password" id="login-pass">
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<input type="submit" class="btn btn-primary btn-large btn-block" value="login">
</form>
		</div>
	</div>
</body>
</html>
