  <link rel="stylesheet" type="text/css" href="gallery.css">
  <?php include '../credentials/auth.php'; ?>
  <?php include 'links/_css.php'; ?>
  <div class="container-scroller">
    <?php include 'links/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'links/sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <i class="mdi mdi-vector-arrange-above icon-md">Gallery</i>
              </span>
            </div>
          </div>
          <div class="row purchace-popup">
            <div class="col-6">
              <span class="d-block d-md-flex align-items-center">
                  <form class="forms-sample" action="gallery_addalbum.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <input type="hidden" name="posted_by" value = "<?php echo $_SESSION['user']['fullname']; ?>" required />
                    <h4 class="card-title">ADD ALBUM:</h4>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>CHOOSE GALLERY COVER</label>
                          <input type="file" name="image" class="form-control" required/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>INPUT ALBUM NAME</label>
                          <input style="padding: 12px;" type="text" placeholder="ALBUM NAME" class="form-control" name="album_name" required />
                        </div>
                      </div>
                      <div class="col-md-3">
                          <input style="padding: 12px; margin-top: 21px;" type="submit" class="btn btn-success mr-2 form-control" name="submit_album" value="POST ALBUM">
                      </div>
                    </div>
                  </form>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <h4 class="card-title">YOUR ALBUM</h4>
                    <?php
                    $mysqli = new mysqli("localhost", "root", "", "lwcf");
                    if (isset($_GET['add_album_action'])) {
                    if ($_GET['add_album_action'] == "successfull") { ?>
                    <br>New album created!<br><br>
                    <?php }
                    }
                    ?>
                    <?php
                    $posted_by = $_SESSION['user']['fullname'];

                    $albums = $mysqli->query("SELECT * FROM gallery_albums WHERE posted_by = '$posted_by'");
                    while ($album_data = $albums->fetch_assoc()) {
                    $photos = $mysqli->query("SELECT * FROM gallery_photos WHERE album_id = ".$album_data['album_id']."");?>
                    
                     <a class="btn btn-secondary" href="gallery_viewalbum.php?album_id=<?php echo $album_data['album_id'] ?>">
                      <div class="card">
                        <img class="image" src="gallery_cover/<?php echo $album_data['image']; ?>" alt="Avatar" style = "width: auto;">
                        <div class="container"><br>
                          <h4><b><?php echo $album_data['album_name'] ?></b></h4> 
                          <p>(<?php echo $photos->num_rows; ?>)</p> 
                        </div>
                      </div>
                     </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                      <h4 class="card-title">Your Album </h4>
                        <table id="gallerytable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Album ID</th>
                                <th>Album Name</th> 
                                <th></th> 
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                include '../credentials/connection.php';
                                $table = mysqli_query($conn, "SELECT * FROM gallery_albums");
                                while($row = mysqli_fetch_array($table)) { 

                                  $album_id=$row['album_id'];
                                  $album_name=$row['album_name'];
                                ?>
                                <tr id="<?php echo $row['album_id'];?>">
                                   <td data-target="album_id"><?php echo $row['album_id']?></td> 
                                   <td data-target="album_name"><?php echo $row['album_name']?></td> 
                                 <td>
                                    <a href="#" role='button' class='btn btn-warning' data-role = "update" data-id="<?php echo $row['album_id']; ?>">
                                      <i class="mdi mdi-pencil">Change</i>
                                    </a>
                                 </td>
                                 <td>
                                    <button class = "btn btn-danger" onClick="deleteData(<?php echo $row['album_id']; ?>)">
                                      <i class="mdi mdi-delete">Delete</i>
                                    </button>
                                  </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
                  </div>
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
    <!-- Modal View Data-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal Content -->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Album</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="form-group">
                <label><strong>Album Name</strong></label>
                  <input class="form-control" type="text" id="album_name">                  
              </div>
              <input type="hidden" id="galleryId" class="form-control">
              <div class="form-group">
                <a href = "#" id="save" class="btn btn-success form-control"><i class="fa fa-save">&nbsp<strong>Save</strong></i></a>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php include 'links/_js.php'; ?>
  <script type="text/javascript" src="gallery_editalbum.js"></script>
  <script type="text/javascript">
    //for datatable
      $(document).ready(function() {
      $('#gallerytable').DataTable();
    } );
  </script>
  <script type="text/javascript">
  // for delete js
    function deleteData(id) {
      if(confirm('Are you sure want to delete this Album?')){
        $.ajax({
          type:'POST',
          url:'gallery_deletealbum.php',
          data:{delete_id:id},
          success:function(data){
            $('#delete'+id).hide();
          }
        });
      }
    }
  </script>
  <script type="text/javascript" src="portal_encouragebell.js"></script>
  <script type="text/javascript" src="prayer_request.js"></script>
  <script type="text/javascript" src="encouragement.js"></script>