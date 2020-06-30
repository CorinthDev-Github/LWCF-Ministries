 <?php include '../credentials/auth.php'; ?>
  <?php include 'links/_css.php'; ?>
  <div class="container-scroller">
    <?php include 'links/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'links/sidebar.php'; ?>
      <div class="main-panel">

        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> 
                    <a href="resource_material.php" style="text-decoration: none;">BACK</a> | WATCH VIDEO / LISTEN AUDIO
                  </h4>
                  <div class="form-group">
                    <?php 
                    include '../credentials/connection.php';

                    if (isset($_GET['id'])) {
                      $id = $_GET['id'];
                      $sql = "SELECT * FROM dashboard_resourcematerials WHERE id='$id'";
                      $result = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $document = $row['document'];
                      }
                      echo "<a href = 'uploaded_resource/".$document."'></a>";
                    } 
                    ?>
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
  <?php include 'links/_js.php'; ?>
  <script type="text/javascript" src="portal_encouragebell.js"></script>
  <script type="text/javascript" src="prayer_request.js"></script>
  <script type="text/javascript" src="encouragement.js"></script>
