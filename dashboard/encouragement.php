  <?php
  // Create Connection
  include '../credentials/auth.php';
  include '../credentials/connection.php';

  if(isset($_POST['btn_edit']))
  { 
    $_SESSION['success'] = "SUCCESSFULLY EDITED!";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $encouragement_concern = $_POST['encouragement_concern'];
    $date_posted = $_POST['date_posted'];
    $comment_status = $_POST['comment_status'];
    $posted_by = $_POST['posted_by'];
        
      $sql = mysqli_query($conn, "UPDATE dashboard_encouragement SET name ='$name', encouragement_concern ='$encouragement_concern', date_posted = '$date_posted', comment_status = '$comment_status', posted_by = '$posted_by' WHERE id = '$id'");  
        $query = mysqli_query($conn, $sql);
        header("location:encouragement.php");
        exit();
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
                  <form id="formEncouragement" class="forms-sample" method="POST"  enctype="multipart/form-data">
                    <h4 class="card-title">Encouragement:</h4>
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" id="name"  class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Encouragement Concern</label>
                        <textarea class="form-control"  rows="2" id="encouragement_concern" name="encouragement_concern"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="posted_by" id="posted_by" value="<?php echo $_SESSION['user']['fullname']; ?>">
                      </div><br>
                      <input type="submit" class="btn btn-success mr-2" name="post" id="post" value="POST ENCOURAGEMENT">
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
                              <th>Encouragement Concern</th>
                              <th>Date</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include '../credentials/connection.php';
                              $client = $_SESSION['user']['fullname'];
                              $table = mysqli_query($conn, "SELECT * FROM dashboard_encouragement WHERE posted_by = '$client'");
                              while($row = mysqli_fetch_array($table)) { 

                                $id=$row['id'];
                                $name=$row['name'];
                                $encouragement_concern=$row['encouragement_concern'];
                                $date_posted=$row['date_posted'];
                              ?>
                              <tr id="<?php echo $row['id'];?>">
                                 <td><?php echo $row['name']?></td> 
                                 <td><?php echo $row['encouragement_concern']?></td> 
                                 <td><?php echo $row['date_posted']?></td> 
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
      if(confirm('Are you sure want to delete this Encouragement?')){
        $.ajax({
          type:'POST',
          url:'encouragementdelete.php',
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
