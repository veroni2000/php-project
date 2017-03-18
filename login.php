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
include('db_connect.php');  //Connection with the database.
if(isset($_POST['submit'])) //Checking if the submit button is pressed.
{
	$username = $_POST['username'];
	$password = $_POST['password']; //Getting username and password from the login form.
	if(($username == 'Veroni2000' && $password == '123456789')||($username == 'Iva13' && $password == 'ivaeyaka'))
	{       //Checking if entered username and password are valid.                    
		$_SESSION['user']=$username;
		echo '<script type="text/javascript"> window.open("index.php","_self");</script>'; //If valid user is entered, it returns you to the home page.
	}else
	{
		echo "Invalid username or password!";        
	}
}
?>