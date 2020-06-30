
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
                <i class="mdi mdi-palette icon-md">Encouragement Portal</i>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-6 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Comment Section:</h4>
                  <form method="GET" id="comment_form">
                    <?php 
                      include '../credentials/connection.php';
                      if (isset($_GET['name_enc'])) {
                        
                      $query = mysqli_query($conn, "SELECT * FROM dashboard_commentenc WHERE name_enc = '".$_GET['name_enc']."' ");

                      while ($row = mysqli_fetch_array($query)) {
                        $comment_id = $row['comment_id'];
                        $comment_subject = $row['comment_subject'];
                        $comment_text = $row['comment_text'];
                        $name_enc = $row['name_enc'];
                        $concern_enc = $row['concern_enc'];
                      ?>

                    <div id="<?php echo $row['name_enc']; ?>" class="form-group border border-dark" style="border-radius: 5px;">
                      <div style="border-bottom: solid 1px;">
                        <em class="text-primary">By: <?php echo $row['comment_subject']; ?></em> <div style="float: right;"><?php echo $row['date_posted']; ?></div>
                      </div>
                      <div style="padding: 5px; margin-left: 15px;" >
                          &nbsp;<?php echo $row['comment_text']; ?>
                      </div>
                    </div>
                    <?php }}?>
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