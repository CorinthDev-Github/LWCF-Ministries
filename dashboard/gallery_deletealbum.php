<?php 
	include '../credentials/connection.php';

	$id = $_POST['delete_id'];
	$sql = mysqli_query($conn,"DELETE FROM gallery_albums WHERE album_id = '$id'");
	$query = mysqli_query($conn, $select);
	header("location: gallery.php");
	exit();

?>