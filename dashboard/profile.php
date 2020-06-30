  <?php include '../credentials/auth.php'; ?>
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
                  <?php 

                  include '../credentials/connection.php';

                  $client = $_SESSION['user']['fullname'];
                  $query = mysqli_query($conn, "SELECT * FROM credentials WHERE fullname = '$client'");

                  while ($row = mysqli_fetch_array($query)) {
                    
                    $fullname = $row['fullname'];
                    $age = $row['age'];
                    $birthday = $row['birthday'];
                    $email = $row['email'];
                    $tof = $row['tof'];

                    ?>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                      <h4 class="card-title">Profile Information:</h4>
                        <div class="form-group">
                          <label for="exampleInputName1">Full Name</label>
                          <input type="text" name="fname" class="form-control" id="exampleInputName1" value="<?php echo $row['fullname']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail3">Age</label>
                          <input type="number" name="age" class="form-control" id="exampleInputEmail3" value="<?php echo $row['age']; ?>"  readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword4">Birthday</label>
                          <input type="text" name="bday" class="form-control" id="exampleInputPassword4" value="<?php echo $row['birthday']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputCity1">Email</label>
                          <input type="email" name="email" class="form-control" id="exampleInputCity1" value="<?php echo $row['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleTextarea1">Testimony of Faith</label>
                          <textarea class="form-control" name="tof" id="exampleTextarea1" rows="2" readonly><?php echo $row['tof']; ?></textarea>
                        </div>
                    </form>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="form-group">
                      <div class="profile-image text-center">
                        <?php 
                            include '../credentials/connection.php';

                            $client = $_SESSION['user']['fullname'];
                            $result = mysqli_query($conn, "SELECT * FROM profile_picture WHERE credits_by = '$client' ORDER BY id DESC LIMIT 1");

                            while ($row = mysqli_fetch_array($result)) {
                              $picture=$row['picture'];
                              ?>
                              <img src='photos/<?php echo $row['picture']; ?>' style = "width: 50%; height: 200px;"><br><br>
                              <h4>Hello, <?php echo $_SESSION['user']['fullname']; ?></h4><hr>
                        <?php } ?> 
                        <?php 
                            include '../credentials/connection.php';

                            $client = $_SESSION['user']['fullname'];
                            $query = mysqli_query($conn, "SELECT * FROM credentials WHERE fullname = '$client'");

                            while ($row = mysqli_fetch_array($query)) {
                              $tof = $row['tof'];
                              ?>
                              <p><em>" <?php echo $row['tof']; ?> "</em></p><hr>
                        <?php } ?> 
                      </div><br>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="form-group">
                      <div class="profile-image text-center">
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <table id="profile" class="table table-striped table-bordered " >
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Birthday</th>
                                    <th>Email</th>
                                    <th>Testimony of Faith</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    include '../credentials/connection.php';
                                    $client = $_SESSION['user']['fullname'];
                                    $table = mysqli_query($conn, "SELECT * FROM credentials WHERE fullname = '$client'");
                                    while($row = mysqli_fetch_array($table)) { 

                                      $id=$row['id'];
                                      $fullname=$row['fullname'];
                                      $age=$row['age'];
                                      $birthday=$row['birthday'];
                                      $email=$row['email'];
                                      $tof=$row['tof'];
                                    ?>
                                    <tr id="<?php echo $row['id'];?>">
                                       <td data-target = "fullname"><?php echo $row['fullname']?></td> 
                                       <td data-target = "age"><?php echo $row['age']?></td> 
                                       <td data-target = "birthday"><?php echo $row['birthday']?></td> 
                                       <td data-target = "email"><?php echo $row['email']?></td> 
                                       <td data-target = "tof"><?php echo $row['tof']?></td>
                                     <td>
                                        <a href="#" role='button' class='btn btn-warning' data-role = "update" data-id="<?php echo $row['id']; ?>">
                                          <i class="mdi mdi-pencil">Edit</i>
                                        </a>
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
          <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="form-group">
                <label><strong>Name</strong></label>
                  <input class="form-control" type="text" id="fullname">                  
              </div>
              <div class="form-group">
                <label><strong>Age</strong></label>
                  <input class="form-control" type="text" id="age">                  
              </div>
              <div class="form-group">
                <label><strong>Birthday</strong></label>
                  <input class="form-control" type="text" id="birthday">                  
              </div>
              <div class="form-group">
                <label><strong>Email</strong></label>
                  <input class="form-control" type="text" id="email">                  
              </div>
              <div class="form-group">
                <label><strong>Testimony of Faith</strong></label>
                  <textarea class="form-control" id="tof"></textarea>                  
              </div>
              <input type="hidden" id="profileId" class="form-control">
              <div class="form-group">
                <a href = "#" id="save" class="btn btn-success form-control"><i class="fa fa-save">&nbsp<strong>Save</strong></i></a>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php include 'links/_js.php'; ?>
  <script type="text/javascript">
    //for datatable
      $(document).ready(function() {
      $('#profile').DataTable();
    } );
  </script>
  <script type="text/javascript" src="profile_update.js"></script>
  <script type="text/javascript" src="portal_encouragebell.js"></script>
  <script type="text/javascript" src="prayer_request.js"></script>
  <script type="text/javascript" src="encouragement.js"></script>