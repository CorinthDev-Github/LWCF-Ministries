<?php
$mysqli = new mysqli("localhost", "root", "", "lwcf");
$album_id = $_GET['album_id'];
if ($_FILES['photo']['name'] != null) {
	for ($i=0; $i<count($_FILES['photo']['tmp_name']); $i++)
		{
			move_uploaded_file($_FILES['photo']['tmp_name'][$i], "images/". $_FILES['photo']['name'][$i]);
			$photo_link = "images/". $_FILES['photo']['name'][$i];
			$upload_photo = $mysqli->query("INSERT INTO gallery_photos (album_id, photo_link) VALUES ($album_id, '$photo_link')");
			if ($upload_photo) {
			header("Location: gallery_viewalbum.php?album_id=$album_id&upload_action=success");
			} else {
			echo $mysqli->error;
			}
		}
	} else {
	header("Location: gallery.php");
}
?>
