  <?php
  // Create Connection
  include '../credentials/auth.php';
  include '../credentials/connection.php';

  if (isset($_POST['btn_post'])) {
          
        $image = $_FILES['image']['name'];
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        move_uploaded_file($temp, "uploaded_resource/".$name);
        $target = "news_upload/".basename($image);
        $_SESSION['success'] = "POST CREATED SUCCESSFULLY!";
        $title = $_POST['title'];
        $description = $_POST['description'];
        $dpost = $_POST['dpost'];
        $posted_by = $_POST['posted_by'];

            $sql = "INSERT INTO dashboard_resourcematerials (title, description, date_posted, picture, posted_by, document)
            VALUES ('$title', '$description', '$dpost', '$image', '$posted_by', '$name')";
            $query = mysqli_query($conn, $sql);
            header('location: resource_material.php'); 
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
              $msg = "Image Uploaded Successfully!";
            }else{
              $msg = "There was a problem uploading image!";
            }
            exit();
        }
        mysqli_close($conn);
      
  ?>
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
                  <form class="forms-sample" action="resource_material.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <h4 class="card-title">Resource Material:</h4>
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputName1">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Description</label>
                        <textarea id="editor" name="description">
                          <p>Hello, <?php echo $_SESSION['user']['fullname']; ?> please include description here!</p>
                        </textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputName1">Upload Photo</label>
                          <input type="file" name="image" class="form-control" required/>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputName1">Upload Document</label>
                          <input type="file" name="file" class="form-control" required/>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Date Post</label>
                        <input type="date" name="dpost" class="form-control" style="width: 15%;" id="exampleInputPassword4" required>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="posted_by" value="<?php echo $_SESSION['user']['fullname']; ?>">
                      </div><br>
                      <input type="submit" class="btn btn-success mr-2" name="btn_post" value="POST RESOURCE MATERIALS">
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">DOWNLOAD RESOURCE MATERIALS</h4>
                    <?php
                      include '../credentials/connection.php';
                      $client = $_SESSION['user']['fullname'];
                      $sql = mysqli_query($conn, "SELECT * FROM dashboard_resourcematerials WHERE posted_by = '$client'");
                      while ($row = mysqli_fetch_array($sql)) {
                        $id = $row['id'];
                        $document = $row['document'];
                        
                        echo "
                        <a onClick='myFunction();' style = 'text-decoration: none;' href='uploaded_resource/".$document."'>
                        $document
                        </a><br><br>";
                      }
                    ?>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">Your Prayer Concern:</h4>
                      <table id="newstable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Date Posted</th>
                              <th>Picture</th> 
                              <th></th> 
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include '../credentials/connection.php';
                              $client = $_SESSION['user']['fullname'];
                              $table = mysqli_query($conn, "SELECT * FROM dashboard_resourcematerials WHERE posted_by = '$client'");
                              while($row = mysqli_fetch_array($table)) { 

                                $id=$row['id'];
                                $title=$row['title'];
                                $description=$row['description'];
                                $date_posted=$row['date_posted'];
                                $image=$row['picture'];
                              ?>
                              <tr id="<?php echo $row['id'];?>">
                                 <td data-target="title"><?php echo $row['title']?></td> 
                                 <td data-target="description"><?php echo $row['description']?></td> 
                                 <td data-target="date_posted"><?php echo $row['date_posted']?></td> 
                                 <td><img src='news_upload/<?php echo $row['picture']; ?>'></td> 
                               <td>
                                  <a href="#" role='button' class='btn btn-warning' data-role = "update" data-id="<?php echo $row['id']; ?>">
                                    <i class="mdi mdi-pencil">Edit</i>
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
                <label><strong>Title</strong></label>
                  <input class="form-control" type="text" id="title">                  
              </div>
              <div class="form-group">
                <label><strong>Description</strong></label>
                  <textarea class="form-control" cols="10" type="text" id="description"></textarea>                  
              </div>
              <div class="form-group">
                <label><strong>Date</strong></label>
                  <input class="form-control" type="text" id="date_posted">                  
              </div>
              <input type="hidden" id="resourceId" class="form-control">
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
  <script type="text/javascript" src="resource_materialedit.js"></script>
  <script type="text/javascript">
    //for datatable
      $(document).ready(function() {
      $('#newstable').DataTable();
    } );
  </script>
  <script type="text/javascript">
  // for delete js
    function deleteData(id) {
      if(confirm('Are you sure want to delete this Resource?')){
        $.ajax({
          type:'POST',
          url:'resource_materialdelete.php',
          data:{delete_id:id},
          success:function(data){
            $('#delete'+id).hide();
          }
        });
      }
    }
  </script>
  <script src="ckeditor/ckeditor.js"></script>
  <script src="ckeditor/samples/js/sample.js"></script>
  <script>
    initSample();
  </script>
  <script type="text/javascript">
  function myFunction() {
      window.alert('Successfully download document!');  
  }
  </script>
  <script type="text/javascript" src="portal_encouragebell.js"></script>
  <script type="text/javascript" src="prayer_request.js"></script>
  <script type="text/javascript" src="encouragement.js"></script>
