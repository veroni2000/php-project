<?php 
session_start();
include('db_connect.php');
if(!isset($_SESSION['user']))
{
	header("Location:login.php");  
}
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
		$cmsg=$_POST['msg'];
		date_default_timezone_set('europe/sofia');
		$ctime=date("H:i:s");
		$username=$_SESSION['user'];
		$insert_query = "INSERT INTO messages (msg,ctime,username) VALUES ('$cmsg','$ctime','$username')";
		if (mysqli_query($conn, $insert_query)) {
		}
	}
	$read_query = "SELECT * FROM messages";
	$result = mysqli_query($conn, $read_query);
	if (mysqli_num_rows($result)>0) {
		while($row = mysqli_fetch_assoc($result)){	
			$text = $row['msg'];
			$msg=$row['msg'];
			$text=explode(' ',$text);
			foreach ($smileys as $key => $value) {
				for ($i=0;$i<count($text);$i++) { 
					if($key==$text[$i]){
						$text1=str_replace($text[$i],'',$text);
						$msg= implode(' ',$text1).$value;
					}
				} 
			}
			echo $row['ctime']." | " . $row['username'] . ": ".$msg."<br>";
		}
	}
?>
<form method="post" action="">
	<input type="text" name="msg">
	<input type="submit" name="submit" value="Send">	
</form>
<?php
echo "<a href='logout.php'> Logout</a> "; 
