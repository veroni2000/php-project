<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/login.css" />
	<title>Register</title>
	<meta charset="utf-8">
</head>
<body>
<center><h3>Create a new user</h3></center>
	<form action="" method="POST" class="login">
		<input type="text" name="username"/><br>
		<input type="password" name="password"/><br>
		<input type="submit" name="submit" value="Sign up"/>
	</form>
</body>
</html>
<?php
session_start();
include('db_connect.php');
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$read_query = "SELECT * FROM  users where username='".$username."'";  
	$result = mysqli_query($conn, $read_query);
	if (mysqli_num_rows($result)>0) { //Checking if the username is taken.
		echo "<center><font color='red'>This username is taken.</font></center>";
	}
	else{$insert_query = "INSERT INTO users (username,password) VALUES ('$username','$password')";
	if (mysqli_query($conn, $insert_query)) {
		echo "New user created successfully";
	} else {
		echo "Error: " . $insert_query . " - " . mysqli_error($conn);
	}
}
}
echo "<br><center><a href='login.php'>Log in</a></center>";