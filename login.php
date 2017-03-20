<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<title>Login</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="POST" class="login">
		<input type="text" name="username"/><br>
		<input type="password" name="password"/><br>
		<input type="submit" name="submit" value="Login"/>
	</form>
</body>
</html>
<?php
session_start();
include('db_connect.php');
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password']; //Getting user and password from the form.
	$select_query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'"; 
	$result = mysqli_query($conn, $select_query);
	if (mysqli_num_rows($result)>0) {  //Checking if the username and password are valid.
		$_SESSION['username']=$username;
		header('Location:index.php');
	} else {
		echo "<center><font color='red'>Invalid username or password!</font></center>";
	}
}
echo "<br><center style='color:white;'><a href='register.php'>Sign up</a></center>";
?>