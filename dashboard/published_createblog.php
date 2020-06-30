  <?php
  // Create Connection
  include '../credentials/auth.php';
  include '../credentials/connection.php';

  if (isset($_POST['btn_post'])) {
          
        $image = $_FILES['image']['name'];
        $target = "news_upload/".basename($image);
        $_SESSION['success'] = "POST CREATED SUCCESSFULLY!";
        $title = $_POST['title'];
        $author = $_POST['author'];
        $article = $_POST['article'];
        $dpost = $_POST['dpost'];
        $postblog = $_POST['postblog'];
        $posted_by = $_POST['posted_by'];

            $sql = "INSERT INTO dashboard_publishedworks (title, author, article, date_posted, post, posted_by, picture)
            VALUES ('$title', '$author', '$article', '$dpost', '$postblog', '$posted_by', '$image')";
            $query = mysqli_query($conn, $sql);
            header('location: published_createblog.php'); 
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
                  <form class="forms-sample" action="published_createblog.php" method="POST"  enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <h4 class="card-title">Create Blogs | <a style="text-decoration: none;" href="published_yourblog.php">View My Blogs</a></h4>
                      <div class="form-group">
                          <label for="exampleInputName1">Upload Photo</label>
                          <input type="file" name="image" class="form-control" required/>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail3" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Author</label>
                        <input type="text" name="author" class="form-control" id="exampleInputName1" value="<?php echo $_SESSION['user']['fullname']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Article</label>
                        <input type="text" name="article" class="form-control" id="exampleInputCity1">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Date Posted</label>
                        <input type="date" name="dpost" class="form-control" style="width: 15%;" id="exampleInputPassword4" required>
                      </div>
                      <div class="form-group">
                        <textarea id="editor" name="postblog">
                          <p>Hello, <?php echo $_SESSION['user']['fullname']; ?> starts your thought here!</p>
                        </textarea>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="posted_by" value="<?php echo $_SESSION['user']['fullname']; ?>">
                      </div><br>
                      <input type="submit" class="btn btn-success mr-2" name="btn_post" value="POST BLOG">
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
