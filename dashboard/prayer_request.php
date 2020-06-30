  <?php
  // Create Connection
  include '../credentials/auth.php';
      
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
                  <form id="formPrayer" class="forms-sample" method="POST"  enctype="multipart/form-data">
                    <h4 class="card-title">Prayer Request:</h4>
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" id="name" class="form-control" id="exampleInputName1" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Prayer Concern</label>
                        <textarea class="form-control" id="prayer_concern" rows="2" name="prayer_concern" required></textarea>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="posted_by" id="posted_by" value="<?php echo $_SESSION['user']['fullname']; ?>">
                      </div><br>
                      <input type="submit" class="btn btn-success mr-2" name="post" id="post" value="POST PRAYER">
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">Your Prayer Concern:</h4>
                      <table id="prayertable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Prayer Concern</th>
                              <th>Date</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include '../credentials/connection.php';
                              $client = $_SESSION['user']['fullname'];
                              $table = mysqli_query($conn, "SELECT * FROM dashboard_prayerconcern WHERE posted_by = '$client'");
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
                                  <button class = "btn btn-danger" onClick="deleteData(<?php echo $row['id']; ?>)">
                                    <i class="mdi mdi-delete"></i>DELETE
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
    <!-- Modal View Data-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal Content -->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Products</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="form-group">
                <label><strong>Name</strong></label>
                  <input class="form-control" type="text" id="name">                  
              </div>
              <div class="form-group">
                <label><strong>Prayer Concern</strong></label>
                  <input class="form-control" type="text" id="prayer_concern">                  
              </div>
              <div class="form-group">
                <label><strong>Date</strong></label>
                  <input class="form-control" type="text" id="date_posted">                  
              </div>
              <input type="hidden" id="prayerId" class="form-control">
              <div class="form-group">
                <a href = "#" id="save" class="btn btn-success form-control"><i class="fa fa-save">&nbsp<strong>Save</strong></i></a>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
  <?php include 'links/_js.php'; ?>
  <script type="text/javascript" src="prayer_requestedit.js"></script>
  <script type="text/javascript">
    //for datatable
      $(document).ready(function() {
      $('#prayertable').DataTable();
    } );
  </script>
  <script type="text/javascript">
  // for delete js
    function deleteData(id) {
      if(confirm('Are you sure want to delete this Prayer Request?')){
        $.ajax({
          type:'POST',
          url:'prayer_requestdelete.php',
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
