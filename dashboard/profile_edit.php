<?php 
include '../credentials/connection.php';

if(isset($_POST['fullname'])) {

	$fullname = $_POST['fullname'];
	$age = $_POST['age'];
	$birthday = $_POST['birthday'];
	$email = $_POST['email'];
	$tof = $_POST['tof'];
	$id = $_POST['id'];

	//query update

	$result = mysqli_query($conn, "UPDATE credentials SET fullname='$fullname', age='$age', birthday='$birthday', email='$email', tof='$tof' WHERE id='$id'");
	if($result){
		return 'Data Updated!';
	}
}

?>