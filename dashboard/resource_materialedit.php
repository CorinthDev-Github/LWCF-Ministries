<?php 
include '../credentials/connection.php';

if(isset($_POST['title'])) {

	$title = $_POST['title'];
	$description = $_POST['description'];
	$date_posted = $_POST['date_posted'];
	$id = $_POST['id'];

	//query update

	$result = mysqli_query($conn, "UPDATE dashboard_resourcematerials SET title='$title', description='$description', date_posted='$date_posted' WHERE id='$id'");
	if($result){
		return 'Data Updated!';
	}
}

?>