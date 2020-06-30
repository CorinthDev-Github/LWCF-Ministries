<?php 
	include '../credentials/connection.php';

	$id = $_POST['delete_id'];
	$sql = mysqli_query($conn,"DELETE FROM dashboard_resourcematerials WHERE id = '$id'");
	$query = mysqli_query($conn, $select);
	header("location: resource_material.php");
	exit();

?>