  <?php include '../credentials/auth.php'; ?>
  <?php include 'links/_css.php'; ?>
  <div class="container-scroller">
    <?php include 'links/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'links/sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">REGISTERED USER</h4>
                    <table id="usertable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Fullname</th>
                            <th>Age</th>
                            <th>Birthday</th>
                            <th>Email</th> 
                            <th>Username</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            include '../credentials/connection.php';
                            $table = mysqli_query($conn, "SELECT * FROM credentials WHERE group_id = 1");
                            while($row = mysqli_fetch_array($table)) { 

                              $id=$row['id'];
                              $fullname=$row['fullname'];
                              $age=$row['age'];
                              $birthday=$row['birthday'];
                              $email=$row['email'];
                              $username=$row['username'];
                            ?>
                            <tr id="<?php echo $row['id'];?>">
                               <td data-target="fullname"><?php echo $row['fullname']?></td> 
                               <td data-target="age"><?php echo $row['age']?></td> 
                               <td data-target="birthday"><?php echo $row['birthday']?></td> 
                               <td data-target="email"><?php echo $row['email']?></td> 
                               <td data-target="username"><?php echo $row['username']?></td> 
                             <td>
                                <a href="#" role='button' class='btn btn-warning' data-role = "update" data-id="<?php echo $row['id']; ?>">
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
        <!-- Modal View Data-->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <div class="form-group">
                      <label><strong>Fullname</strong></label>
                        <input class="form-control" type="text" id="fullname" readonly>                  
                    </div>
                    <div class="form-group">
                      <label><strong>Age</strong></label>
                        <input class="form-control" type="text" id="age" readonly>                  
                    </div>
                    <div class="form-group">
                      <label><strong>Birthday</strong></label>
                        <input class="form-control" type="text" id="birthday" readonly>                  
                    </div>
                    <div class="form-group">
                      <label><strong>Email</strong></label>
                        <input class="form-control" type="text" id="email" readonly>                  
                    </div>
                    <div class="form-group">
                      <label><strong>Username</strong></label>
                        <input class="form-control" type="text" id="username" readonly>                  
                    </div>
                    <input type="hidden" id="userId" class="form-control">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
      $('#usertable').DataTable();
    } );
  </script>
  <script type="text/javascript">
  // for delete js
    function deleteData(id) {
      if(confirm('Are you sure want to delete this Account?')){
        $.ajax({
          type:'POST',
          url:'user_registereddelete.php',
          data:{delete_id:id},
          success:function(data){
            $('#delete'+id).hide();
          }
        });
      }
    }
  </script>
  <script type="text/javascript" src="user_registeredview.js"></script>
  <script type="text/javascript" src="portal_encouragebell.js"></script>
  <script type="text/javascript" src="prayer_request.js"></script>
  <script type="text/javascript" src="encouragement.js"></script>