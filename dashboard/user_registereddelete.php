<?php 
	include '../credentials/connection.php';

	$id = $_POST['delete_id'];
	$sql = mysqli_query($conn,"DELETE FROM credentials WHERE id = '$id'");
	$query = mysqli_query($conn, $select);
	header("location: user_registered.php");
	exit();

?>