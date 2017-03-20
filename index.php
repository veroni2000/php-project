<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Chat</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php 
	session_start();
	include('db_connect.php');
	include('header.php');
	include('emoji.php');
	if(!isset($_SESSION['username']))
	{
		echo "You need to <a href='login.php'>log in</a> or <a href='register.php'>sign up</a>!";
  //If there isn`t session, it returns you to the login page.
	}
	else{
	$read_query = "SELECT * FROM  users where username='".$_SESSION['username']."'";  //Getting current user.
	$result = mysqli_query($conn, $read_query);
	if (mysqli_num_rows($result)>0) {
		while($row = mysqli_fetch_assoc($result)){
			echo "<div id='wrapper'><div id='menu'><p class='welcome'>Welcome, <b>".$row['username']."</b></p>
			<p class='logout'><a id='exit' href='logout.php'>Log out</a></p><div style='clear:both'></div>
</div><div id='chatbox'>";
			$user_id=$row['user_id']; //Getting current user`s id.
		}
	if(isset($_POST['submit']))  //Checking if the submit button is pressed.
	{
		$cmsg=$_POST['msg'];  //Getting current message.
		date_default_timezone_set('europe/sofia');
		$ctime=date("H:i:s"); //Getting current time.
		$insert_query = "INSERT INTO messages (msg,ctime,user_id) VALUES ('$cmsg','$ctime','$user_id')"; //Insert user, time and message into the database.
		if (mysqli_query($conn, $insert_query)) {  
		}
	}
	$read_query = "SELECT * FROM messages JOIN users ON messages.user_id=users.user_id ORDER BY `ctime`";  //Reading messages from the database.
	$result = mysqli_query($conn, $read_query);
	if (mysqli_num_rows($result)>0) {
		while($row = mysqli_fetch_assoc($result)){	
			$msg=$row['msg'];  //Getting messages from the database. We have to check if there are emoticons.
			$msg1=explode(' ',$msg); //Using different variable (so $msg doesn`t change if there is no emoticon in the message) and exploding it into array.
			foreach ($smileys as $key => $value) {
				for ($i=0;$i<count($msg1);$i++) { 
					if($key==$msg1[$i]){ //Checking if there are symbols that make emoticon in the message.
						$msg=str_replace($msg1[$i], $value ,$msg1); //Replacing the symbols with the emoticon.
						$msg= implode(' ',$msg); //Imploding the message back to string, but now it contains emoticons.
					}
				} 
			}
			echo "<p>".$row['ctime']." | " . $row['username'] . ": ".$msg; //Showing the message with user and time.
			if ($_SESSION['username']=='Veroni2000'||$_SESSION['username']=='Iva13') {
				echo " <a href='delete.php?id=" .$row['id'] . "' class='delete'>Delete</a></p>"; //We can delete everyone`s messages.
			}
			elseif ($row['username']==$_SESSION['username']) {
				echo " <a href='delete.php?id=" .$row['id'] . "' class='delete'>Delete</a></p>"; //Everyone else can delete only their own messages.
			}
		}
	}
	?>
	<form method="post" action="" id="message">
		<input type="text" name="msg" id="msg" size="63">
		<input style="border-radius:10px; padding:6px; background-color:#9c27b0; color:#fff; font-size:14px;" type="submit" name="submit" value="Send">	
	</form>
	<?php
}
}
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
});
</script>
</body>
</html>