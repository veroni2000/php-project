<?php
include('login.php');
if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
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