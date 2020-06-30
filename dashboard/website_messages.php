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
                <i class="mdi mdi-inbox icon-md">Messages</i>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">Messages</h4>
                      <table id="messagetable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th> 
                              <th>Subject</th> 
                              <th>Date</th> 
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include '../credentials/connection.php';
                              
                              $query = mysqli_query($conn, "SELECT * FROM website_messages");
                              while($row = mysqli_fetch_array($query)) { 

                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $subject = $row['subject'];
                                $date = $row['date'];
                                $message = $row['message'];

                              ?>
                              <tr id="<?php echo $row['id'];?>">
                                 <td><?php echo $row['name']?></td> 
                                 <td><?php echo $row['email']?></td> 
                                 <td><?php echo $row['subject']?></td> 
                                 <td><?php echo $row['date']?></td>  
                               <td>
                                  <button type="button" class='btn btn-warning' data-toggle = "modal" data-target="#myModal">
                                    <i class="mdi mdi-eye">Read</i>
                                  </button>
                               </td>
                               <td>
                                  <button class = "btn btn-danger" onClick="deleteData(<?php echo $row['id']; ?>)">
                                    <i class="mdi mdi-delete">Delete</i>
                                  </button>
                                </td>
                              </tr>
                              <!-- Modal View Data-->
                              <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal Content -->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Read Message</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label><em><b>By:</b></em>&nbsp;&nbsp;<?php echo $row['name']; ?></label>                
                                      </div>
                                      <div class="form-group">
                                        <label><em><b>Date:</b>&nbsp;</em><?php echo $row['date']; ?></label>               
                                      </div>
                                      <div class="form-group">
                                        <label><em><b>Subject:&nbsp;&nbsp;</b></em><?php echo $row['subject']; ?></label>    
                                        <textarea class="form-control" rows="4" readonly><?php echo $row['message']; ?></textarea>             
                                      </div>
                                      <div class="form-group">   
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
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
      $('#messagetable').DataTable();
    } );
  </script>
  <script type="text/javascript">
  // for delete js
    function deleteData(id) {
      if(confirm('Are you sure want to delete this Message?')){
        $.ajax({
          type:'POST',
          url:'website_messagesdelete.php',
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