  <?php
  // Create Connection
  include '../credentials/auth.php';
  include '../credentials/connection.php';

  if (isset($_POST['btn_post'])) {
          
        $image = $_FILES['image']['name'];
        $target = "photos/".basename($image);
        $_SESSION['success'] = "UPLOADED SUCCESSFULLY!";
        $credits_by = $_POST['credits_by'];

            $sql = "INSERT INTO profile_picture (picture, credits_by)
            VALUES ('$image', '$credits_by')";
            $query = mysqli_query($conn, $sql);
            header('location: settings_accounts.php'); 
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
              $msg = "Image Uploaded Successfully!";
            }else{
              $msg = "There was a problem uploading image!";
            }
            exit();
        }
        mysqli_close($conn);
      
  ?>
  <?php include 'links/_css.php'; ?>
  <div class="container-scroller">
    <?php include 'links/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'links/sidebar.php'; ?>
      <div class="main-panel">

        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php if (isset($_SESSION['success'])) : ?>
                    <div class="success" id="flash-msg">
                      <p class="alert alert-success">
                        <?php 
                          echo $_SESSION['success']; 
                          unset($_SESSION['success']);
                        ?>
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                      </p>
                    </div>
                  <?php endif ?>
                  <form class="forms-sample" action="settings_accounts.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <h4 class="card-title">General Account Settings:</h4>
                      <div class="form-group">
                          <label for="exampleInputName1">Upload Profile Picture</label>
                          <input type="file" name="image" class="form-control" required/>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="credits_by" value="<?php echo $_SESSION['user']['fullname']; ?>">
                      </div><br>
                      <input type="submit" class="btn btn-success mr-2" name="btn_post" value="UPLOAD PHOTO">
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
  <script type="text/javascript" src="portal_encouragebell.js"></script>
  <script type="text/javascript" src="prayer_request.js"></script>
  <script type="text/javascript" src="encouragement.js"></script>
