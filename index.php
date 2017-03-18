<?php 
session_start();
include('db_connect.php');
if(!isset($_SESSION['user']))
{
	header("Location:login.php");  //If there isn`t session, it returns you to the login page.
}
	$smileys=array( //Array with all the symbols that can turn into emoticons.
		':)'=>'😊',
		':-)'=>'😊',
		'<3'=>'💗',
		':Д'=>'😀',
		':D'=>'😀',
		':d'=>'😀',
		';Д'=>'😂',
		';D'=>'😂',
		';d'=>'😂',
		';*'=>'😘',
		':*'=>'😘',
		':/'=>'😐',
		':@'=>'😠',
		':o'=>'😲',
		':O'=>'😲',
		':('=>'😔',
		'o:)'=>'😇',
		'O:)'=>'😇',
		';('=>'😢',
		":'("=>'😭',
		';)'=>'😉',
		':p'=>'😛',
		':P'=>'😛',
		';p'=>'😜',
		';P'=>'😜',
		'B)'=>'😎',
		'*poop*'=>'💩',
		'(y)'=>'👍',
		'(n)'=>'👎',
		);
	if(!empty($_POST['submit']))  //Checking if the submit button is pressed.
	{
		$cmsg=$_POST['msg'];  //Getting current message.
		date_default_timezone_set('europe/sofia');
		$ctime=date("H:i:s"); //Getting current time.
		$username=$_SESSION['user']; //Getting user data.
		$insert_query = "INSERT INTO messages (msg,ctime,username) VALUES ('$cmsg','$ctime','$username')"; //Insert user, time and message into the database.
		if (mysqli_query($conn, $insert_query)) {
		}
	}
	$read_query = "SELECT * FROM messages";  //Reading messages from the database.
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
			echo $row['ctime']." | " . $row['username'] . ": ".$msg."<br>"; //Showing the message with user and time.
		}
	}
?>
<form method="post" action="">
	<input type="text" name="msg">
	<input type="submit" name="submit" value="Send">	
</form>
<?php
echo "<a href='logout.php'>Log out</a> "; //If you press the logout button, it returns you to the logout page.