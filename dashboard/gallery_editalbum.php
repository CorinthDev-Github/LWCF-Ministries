<?php 
include '../credentials/connection.php';

if(isset($_POST['album_name'])) {

	$album_name = $_POST['album_name'];
	$id = $_POST['id'];

	//query update

	$result = mysqli_query($conn, "UPDATE gallery_albums SET album_name='$album_name' WHERE album_id ='$id'");
	if($result){
		return 'Data Updated!';
	}
}

?>