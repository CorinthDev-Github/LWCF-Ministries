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
  <style type="text/css">
  	.gallery img {
	    width: 20%;
	    height: 30%;
	    padding: 15px;
	    border-radius: 5px;
	    cursor: pointer;
	}

	.btn_delete {
		position: absolute;
		margin-left: -5.9%;
		margin-top: 14.4%;
	}

	#myImg {
	  border-radius: 5px;
	  cursor: pointer;
	  transition: .30s;
	}

	#myImg:hover {opacity: 0.7;}
  </style>
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
					<a href="gallery.php" style="text-decoration: none;">Back</a> | <a style="text-decoration: none; color: red;"><?php echo $album_data['album_name'] ?> (<?php echo $photo_count->num_rows; ?>)</a><br><br>
					<form class="forms-sample" method="POST" action="gallery_uploadphoto.php?album_id=<?php echo $album_id ?>" enctype="multipart/form-data">
					<label>Add photo to this album:</label><br>
					<div class="row">
						<div class="col-md-3">
			                    <a class="btn btn-primary" href='javascript:;'>
			                      Choose Photos
			                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="photo[]" size="40"  onchange='$("#upload-file-info").html($(this).val());' multiple required>
			                    </a>
			                    &nbsp;
						</div>
						<div class="col-md-4">
							<span class='label label-info' id="upload-file-info"></span>
						</div>
						<div class="col-md-5">
	                    	<input class="btn btn-warning" type="submit" name="upload_photo" value="Upload" />
						</div>
					</div>
					</form>
                </div>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
					<?php
					if (isset($_GET['upload_action'])) {
					if ($_GET['upload_action'] == "success") { ?>
					<br><br>Photo successfully added to this album!<br><br>
					<?php } }?>
					<form method="POST">
						<div class="card-title">
							<h4>All Photos</h4>
						</div>
                        <div class="gallery">
	                      	<?php
	                          include '../credentials/connection.php';
	                          $table = mysqli_query($conn, "SELECT * FROM gallery_photos WHERE album_id = '$album_id'");
	                          while($row = mysqli_fetch_array($table)) { 

	                          	$photo_id=$row['photo_id'];
	                            $photo_link=$row['photo_link'];
	                          ?>
						        <a href="<?php echo $row['photo_link'] ?>">
						            <img id="myImg" src="<?php echo $row['photo_link'] ?>" alt="" />
						        </a>
	                          	<button class = "btn btn-danger btn_delete" onClick="deleteData(<?php echo $row['photo_id']; ?>)">
	                            	<i class="mdi mdi-delete"></i>
	                          	</button>
	                          	<!-- The Modal -->
								<div id="myModal" class="modal">
								  <span class="close">&times;</span>
								  <img class="modal-content" id="img01">
								  <div id="caption"></div>
								</div>
							<?php } ?>
						</div>
					</form>
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
  <script type="text/javascript">
  // for delete js
    function deleteData(id) {
      if(confirm('Are you sure want to delete this Picture?')){
        $.ajax({
          type:'POST',
          url:'gallery_delete.php',
          data:{delete_id:id},
          success:function(data){
            $('#delete'+id).hide();
          }
        });
      }
    }
</script>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
  <script type="text/javascript" src="portal_encouragebell.js"></script>
  <script type="text/javascript" src="prayer_request.js"></script>
  <script type="text/javascript" src="encouragement.js"></script>