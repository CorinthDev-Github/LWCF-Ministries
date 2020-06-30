
  <?php include '../credentials/auth.php';?>
  <?php include 'links/_css.php'; ?>
  <div class="container-scroller">
    <?php include 'links/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'links/sidebar_adminportal.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <i class="mdi mdi-palette icon-md">Prayer Portal</i>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-6 grid-margin">
              <div class="card">
                <div class="card-body">
                <form method="POST" id="comment_form">
                  <?php 

                  include '../credentials/connection.php';

                  if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $query = mysqli_query($conn, "SELECT * FROM dashboard_prayerconcern WHERE id = '".$id."' ");

                    while ($row = mysqli_fetch_array($query)) {
                      $id = $row['id'];
                      $name = $row['name'];
                      $prayer_concern = $row['prayer_concern'];
                      $date_posted = $row['date_posted'];
                      $posted_by = $row['posted_by'];

                      ?>
                    <p><em>By: <?php echo $row['posted_by']; ?></em>&nbsp;|&nbsp;<?php echo $row['date_posted']; ?></p>
                    <div class="form-group">
                      <input type="hidden" id = "type_concern" name = "type_concern" class="form-control" value="prayer concern" readonly>
                      <label>Name:</label>
                      <input type="text" value="<?php echo $row['name']; ?>" id = "name_enc" name = "name_enc" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Prayer Concern:</label>
                      <textarea type="text" class="form-control" rows="5" id = "concern_enc" name = "concern_enc" readonly><?php echo $row['prayer_concern']; ?></textarea>
                    </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="subject" name="subject" value="<?php echo $_SESSION['user']['fullname']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Comment:</label>
                        <textarea rows="5" class="form-control" name="comment" id="comment" required></textarea>
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-warning" name="post" id="post" value="POST COMMENT">
                      </div>
                  </form>
                  <?php }}?>
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Comment Section:</h4>
                  <form>
                    <?php 
                      include '../credentials/connection.php';

                      $query = mysqli_query($conn, "SELECT * FROM dashboard_commentenc WHERE type_concern = 'prayer concern' ");

                      while ($row = mysqli_fetch_array($query)) {
                        $comment_subject = $row['comment_subject'];
                        $comment_text = $row['comment_text'];
                        $date_posted = $row['date_posted'];
                        ?>
                        <div class="form-group border border-dark" style="border-radius: 5px;">
                            <div style="border-bottom: solid 1px;">
                              <em class="text-primary">By: <?php echo $row['comment_subject']; ?></em> <div style="float: right;"><?php echo $row['date_posted']; ?></div>
                            </div>
                            <div style="padding: 5px; margin-left: 15px;" >
                                &nbsp;<?php echo $row['comment_text']; ?>
                            </div>
                        </div>
                    <?php }?>
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
    //for datatable
      $(document).ready(function() {
      $('#prayertable').DataTable();
    } );
  </script>
  <script type="text/javascript" src="portal_encouragebell.js"></script>
  <script type="text/javascript" src="prayer_request.js"></script>
  <script type="text/javascript" src="encouragement.js"></script>