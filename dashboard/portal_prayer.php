  <?php include '../credentials/auth.php'; ?>
  <?php include 'links/_css.php'; ?>
  <div class="container-scroller">
    <?php include 'links/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'links/sidebar_userportal.php'; ?>
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
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">Prayer Concern:</h4>
                      <table id="prayertable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Prayer Concern</th>
                              <th>Date Posted</th>
                              <th></th> 
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include '../credentials/connection.php';
                              $table = mysqli_query($conn, "SELECT * FROM dashboard_prayerconcern ORDER BY id DESC");
                              while($row = mysqli_fetch_array($table)) { 

                                $id=$row['id'];
                                $name=$row['name'];
                                $prayer_concern=$row['prayer_concern'];
                                $date_posted=$row['date_posted'];
                              ?>
                              <tr id="<?php echo $row['id'];?>">
                                 <td data-target="name"><?php echo $row['name']?></td> 
                                 <td data-target="prayer_concern"><?php echo $row['prayer_concern']?></td> 
                                 <td data-target="date_posted"><?php echo $row['date_posted']?></td> 
                               <td>
                                  <a href="portal_prayerview.php?id=<?php echo $row['id']; ?>" class='btn btn-warning'>
                                    <i class="mdi mdi-eye">View</i>
                                  </a>
                               </td>
                               <td>
                                  <button class = "btn btn-danger" onClick="deleteData(<?php echo $row['id']; ?>)">
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
  <script type="text/javascript">
  // for delete js
    function deleteData(id) {
      if(confirm('Are you sure want to delete this Prayer?')){
        $.ajax({
          type:'POST',
          url:'portal_prayerdelete.php',
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