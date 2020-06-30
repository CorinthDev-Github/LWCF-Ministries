  <?php
  include '../credentials/auth.php';
  include '../credentials/connection.php';
  if(isset($_GET["id"]))
  {
  $query = mysqli_query($conn, "SELECT * FROM dashboard_publishedworks WHERE id = '".$_GET["id"]."'");
  while($row = mysqli_fetch_array($query))
      {   
          $id=$row['id'] ;
          $title=$row['title'];
          $author=$row['author'];
          $article=$row['article'];
          $dpost=$row['date_posted'];
          $post=$row['post'];
      }
  }
  ?>
  <?php include 'links/_css.php'; ?>
  <head>
    <link rel="stylesheet" href="ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
  </head>
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
                  <form class="forms-sample" action="published_yourblog.php" method="POST"  enctype="multipart/form-data">
                    <h4 class="card-title">Delete Blogs:</h4>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Title</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" name="title" class="form-control" id="exampleInputEmail3" value ="<?php echo $title; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Author</label>
                        <input type="text" name="author" class="form-control" id="exampleInputName1" value="<?php echo $author; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Article</label>
                        <input type="text" name="article" class="form-control" id="exampleInputCity1" value="<?php echo $article; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Date Posted</label>
                        <input type="date" name="dpost" class="form-control" id="exampleInputPassword4" value="<?php echo $dpost; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <textarea id="editor" name="postblog" readonly>
                          <p><?php echo $post;?></p>
                        </textarea>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="posted_by" value="<?php echo $_SESSION['user']['fullname']; ?>">
                      </div><br>
                      <input type="submit" class="btn btn-danger mr-2" name="btn_delete" value="DELETE BLOG">
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
  <script src="ckeditor/ckeditor.js"></script>
  <script src="ckeditor/samples/js/sample.js"></script>
  <script>
    initSample();
  </script>
  <script type="text/javascript" src="portal_encouragebell.js"></script>
  <script type="text/javascript" src="prayer_request.js"></script>
  <script type="text/javascript" src="encouragement.js"></script>
