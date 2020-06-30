  <?php
  // Create Connection
  include '../credentials/auth.php';
  include '../credentials/connection.php';

    if (isset($_GET['id'])) {

    	$id = $_GET['id'];

    	$query = mysqli_query($conn, "SELECT * FROM dashboard_encouragement WHERE id = '$id' ");

    	while ($row = mysqli_fetch_array($query)) {

    		$id = $row['id'];
    		$name = $row['name'];
    		$encouragement_concern = $row['encouragement_concern'];
    		$date_posted = $row['date_posted'];
    		$comment_status = $row['comment_status'];
    		$posted_by = $row['posted_by'];
    	}
    }
  ?>
  <?php include 'links/_css.php'; ?>
  <div class="container-scroller">
    <?php include 'links/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'links/sidebar_user.php'; ?>
      <div class="main-panel">

        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="encouragement.php" method="POST"  enctype="multipart/form-data">
                    <h4 class="card-title">Encouragement:</h4>
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>"  class="form-control">
                        <input type="hidden" name="posted_by" value="<?php echo $posted_by; ?>"  class="form-control">
                        <input type="hidden" name="comment_status" value="<?php echo $comment_status; ?>"  class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Encouragement Concern</label>
                        <textarea class="form-control"  rows="2" name="encouragement_concern"><?php echo $encouragement_concern; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Date:</label>
                        <input type="text" name="date_posted" value="<?php echo $date_posted; ?>"  class="form-control">
                      </div><br>
                      <input type="submit" class="btn btn-success mr-2" name="btn_edit" value="UPDATE ENCOURAGEMENT">
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
