<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Your Messages</title>
</head>
<body>
	<b>Welcome, <i><?php echo $login_session; ?>!</i></b><br>
	<form action="" method="POST">
		<input type="text" name="text"/>
		<input type="submit" name="submit" value="Send"/>
	</form>
	<?php
	$smileys=array(
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
	if(!empty($_POST['submit']))
	{
		$text = $_POST['text'];
		$msg=$_POST['text'];
		$text=explode(' ',$text);
		foreach ($smileys as $key => $value) {
			for ($i=0;$i<count($text);$i++) { 
				if($key==$text[$i]){
					$text1=str_replace($text[$i],'',$text);
					$msg= implode(' ',$text1).$value;
				}
			} 
		}
		$read_query = "SELECT * FROM messages";
	$time=date("H:m");
	$insert_query = "INSERT INTO messages (msg,time) VALUES ('$msg','$time')";
	echo $time." <b>".$_SESSION['login_user']."</b>: ".stripslashes(htmlspecialchars($msg)); 
	}
	?>

	<br><b><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>