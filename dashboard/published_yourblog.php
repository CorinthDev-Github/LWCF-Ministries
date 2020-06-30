  <?php
    include '../credentials/auth.php';
    include '../credentials/connection.php';
    if(isset($_POST['btn_edit']))
    { 
      $_SESSION['success'] = "SUCCESSFULLY EDITED!";
      $id = $_POST['id'];
      $title = $_POST['title'];
      $author = $_POST['author'];
      $article = $_POST['article'];
      $dpost = $_POST['dpost'];
      $post = $_POST['postblog'];
          
        $sql = mysqli_query($conn, "UPDATE dashboard_publishedworks SET title ='$title', author ='$author', article ='$article', date_posted ='$dpost', post ='$post' WHERE id = '$id'");  
          $query = mysqli_query($conn, $sql);
          header("location:published_yourblog.php");
          exit();
    }

    if(isset($_POST['btn_delete']))
    { 
      $_SESSION['deleted'] = "SUCCESSFULLY DELETED!";
      $id = $_POST['id'];
      $title = $_POST['title'];
      $author = $_POST['author'];
      $article = $_POST['article'];
      $dpost = $_POST['dpost'];
      $post = $_POST['postblog'];
          
        $sql = mysqli_query($conn, "DELETE FROM dashboard_publishedworks WHERE id = '$id'");  
          $query = mysqli_query($conn, $sql);
          header("location:published_yourblog.php");
          exit();
    }

    mysqli_close($conn);
  ?>
  <?php include 'links/_css.php'; ?>
  <div class="container-scroller">
    <?php include 'links/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'links/sidebar_user.php'; ?>
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
                  <?php if (isset($_SESSION['deleted'])) : ?>
                    <div class="success" id="flash-msg">
                      <p class="alert alert-success">
                        <?php 
                          echo $_SESSION['deleted']; 
                          unset($_SESSION['deleted']);
                        ?>
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                      </p>
                    </div>
                  <?php endif ?>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title"><a href = "published_createblog.php" style="text-decoration: none;">Back</a> | Your Blogs:</h4>
                      <table id="yourblog" class="table table-striped table-bordered " >
                          <thead>
                            <tr>
                              <th>Title</th>
                              <th>Author</th>
                              <th>Article</th>
                              <th>Date</th>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include '../credentials/connection.php';
                              $client = $_SESSION['user']['fullname'];
                              $table = mysqli_query($conn, "SELECT * FROM dashboard_publishedworks WHERE posted_by = '$client'");
                              while($row = mysqli_fetch_array($table)) { 

                                $id=$row['id'];
                                $title=$row['title'];
                                $author=$row['author'];
                                $article=$row['article'];
                                $date_posted=$row['date_posted'];
                              ?>
                              <tr id="<?php echo $row['id'];?>">
                                 <td><?php echo $row['title']?></td> 
                                 <td><?php echo $row['author']?></td> 
                                 <td><?php echo $row['article']?></td> 
                                 <td><?php echo $row['date_posted']?></td> 
                               <td>
                                  <a href="published_editblog.php?id=<?php echo $row['id'];?>" class='btn btn-warning'>
                                    <i class="mdi mdi-pencil">Edit</i>
                                  </a>
                               </td>
                               <td>
                                  <a href="published_deleteblog.php?id=<?php echo $row['id'];?>" class='btn btn-danger'>
                                    <i class="mdi mdi-delete">Delete</i>
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
      $('#yourblog').DataTable();
    } );
  </script>
  <script>
    $(document).ready(function() {
      $("#txtEditor").Editor();
    });
  </script>
  <script type="text/javascript" src="portal_encouragebell.js"></script>
  <script type="text/javascript" src="prayer_request.js"></script>
  <script type="text/javascript" src="encouragement.js"></script>