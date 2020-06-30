<?php 
include '../credentials/connection.php';

if(isset($_POST['name'])) {

	$name = $_POST['name'];
	$prayer_concern = $_POST['prayer_concern'];
	$date_posted = $_POST['date_posted'];
	$id = $_POST['id'];

	//query update

	$result = mysqli_query($conn, "UPDATE dashboard_prayerconcern SET name='$name', prayer_concern='$prayer_concern', date_posted='$date_posted' WHERE id='$id'");
	if($result){
		return 'Data Updated!';
	}
}

?>