<?php 
	include '../credentials/connection.php';

	$id = $_POST['delete_id'];
	$sql = mysqli_query($conn,"DELETE FROM dashboard_podcasts WHERE id = '$id'");
	$query = mysqli_query($conn, $select);
	header("location: podcasts.php");
	exit();

?>