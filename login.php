<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="POST">
		Username:<input type="text" name="username"/><br>
		Password:<input type="password" name="password"/><br>
		<input type="submit" name="submit" value="Login"/>
	</form>
</body>
</html>
<?php
session_start();
include('db_connect.php');
if(isset($_POST['submit'])) 
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(($username == 'Veroni2000' && $password == '123456789')||($username == 'Iva13' && $password == 'ivaeyaka'))
	{                              
		$_SESSION['user']=$username;
		echo '<script type="text/javascript"> window.open("read.php","_self");</script>'; 
	}else
	{
		echo "Invalid username or password!";        
	}
}
?>