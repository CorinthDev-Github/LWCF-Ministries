  <?php
    $mysqli = new mysqli("localhost", "root", "", "lwcf");
	if (isset($_POST['submit_album'])) {
	$image = $_FILES['image']['name'];
    $target = "gallery_cover/".basename($image);
	$album = $_POST['album_name'];
	$posted_by = $_POST['posted_by'];
	$add_album = $mysqli->query("INSERT INTO gallery_albums (album_name, posted_by, image) VALUES ('$album', '$posted_by', '$image')");
	if ($add_album) {
	header("Location: gallery.php?add_album_action=successfull");
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
	  $msg = "Image Uploaded Successfully!";
	}else{
	  $msg = "There was a problem uploading image!";
	}
	} else {
	echo $mysqli-error;
	}
	}
	?>
	<?php
    $mysqli = new mysqli("localhost", "root", "", "lwcf");
	if (isset($_GET['album_id'])) {
	$album_id = $_GET['album_id'];
	$get_album = $mysqli->query("SELECT * FROM gallery_albums WHERE album_id = $album_id");
	$album_data = $get_album->fetch_assoc();
	} else {
	header("Location: gallery.php");
	}
	?>
  <?php include '../credentials/auth.php'; ?>
  <?php include 'links/_css.php'; ?>
  <div class="container-scroller">
    <?php include 'links/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'links/sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-6 grid-margin">
              <div class="card">
                <div class="card-body">
                	<?php
					$photo_count = $mysqli->query("SELECT * FROM gallery_photos WHERE album_id = $album_id");
					?>
					<a href="index.php">Home</a> | <?php echo $album_data['album_name'] ?> (<?php echo $photo_count->num_rows; ?>)<br><br>
					<form class="forms-sample" method="POST" action="gallery_uploadphoto.php?album_id=<?php echo $album_id ?>" enctype="multipart/form-data">
					<label>Add photo to this album:</label><br>
					<input type="file" name="photo" /> <input type="submit" name="upload_photo" value="Upload" />
					</form>
					<?php
					if (isset($_GET['upload_action'])) {
					if ($_GET['upload_action'] == "success") { ?>
					<br><br>Photo successfully added to this album!<br><br>
					<?php }
					}
					?>
					<?php
					$photos = $mysqli->query("SELECT * FROM gallery_photos WHERE album_id = $album_id");
					while($photo_data = $photos->fetch_assoc()) { ?>
					<img src="<?php echo $photo_data['photo_link'] ?>" width="200px" height="200px" />
					<?php }
					?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <?php include 'links/footer.php'; ?>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <?php include 'links/_js.php'; ?>