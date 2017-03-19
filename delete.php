<?php 
include('db_connect.php');	
	$id = $_GET['id'];
	$delete_query = "DELETE FROM messages WHERE id = $id ";
	$result = mysqli_query($conn, $delete_query);
	if ($result) {
		return header('Location: index.php');  
	} 