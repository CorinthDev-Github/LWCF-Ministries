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
                <i class="mdi mdi-inbox icon-md">Inbox</i>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-6 grid-margin">
              <div class="card">
                <div class="card-body">
                  <?php 

                  if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM website_messages WHERE id='$id'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      $id = $row['id'];
                      $name = $row['name'];
                      $subject = $row['subject'];
                      $message = $row['message'];
                      ?>
                      <p>
                        <a href="website_messages.php" style="text-decoration: none;">Back</a> | 
                        <em>by: &nbsp;</em><?php echo $row['name']; ?>
                      </p>
                      <label>Subject: <?php echo $row['subject']; ?></label>
                      <textarea rows="3" class="form-control" readonly><?php echo $row['message'];?></textarea>
                  <?php }}?>
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
      $('#messagetable').DataTable();
    } );
  </script>
  <script type="text/javascript" src="portal_encouragebell.js"></script>
  <script type="text/javascript" src="prayer_request.js"></script>
  <script type="text/javascript" src="encouragement.js"></script>