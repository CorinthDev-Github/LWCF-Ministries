<?php 
	include '../credentials/connection.php';

	$id = $_POST['delete_id'];
	$sql = mysqli_query($conn,"DELETE FROM website_messages WHERE id = '$id'");
	$query = mysqli_query($conn, $select);
	header("location: website_messages.php");
	exit();

?>