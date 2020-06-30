  <?php
    $mysqli = new mysqli("localhost", "root", "", "lwcf");
    if (isset($_GET['album_id'])) {
    $album_id = $_GET['album_id'];
    $get_album = $mysqli->query("SELECT * FROM gallery_albums WHERE album_id = $album_id");
    $album_data = $get_album->fetch_assoc();
    } else {
    header("Location: gallery.php");
    }
  ?>
  <?php include 'links/_css.php'; ?>
  <style>
  .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
  }

  .card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }
  .container {
  padding: 2px 16px;
  }

  .image {
  width: auto;
  height: 20%;
  }
  </style>

  <?php include 'links/page_header.php'; ?>
  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    
   <?php include 'links/feature.php'; ?>

    <!--==========================
      Services Section
    ============================-->
    
    <section id="services">
      <div class="container">
        <header class="section-header wow fadeInUp">
          <h3>Gallery</h3>
          <p>
            <?php
            $photo_count = $mysqli->query("SELECT * FROM gallery_photos WHERE album_id = $album_id");
            ?>
            <a href="gallery.php" style="text-decoration: none;">Back</a> | <a style="text-decoration: none; color: red;"><?php echo $album_data['album_name'] ?> (<?php echo $photo_count->num_rows; ?>)</a>
          </p>
        </header>
        <div class="row">
          <?php
            include 'credentials/connection.php';
            $table = mysqli_query($conn, "SELECT * FROM gallery_photos WHERE album_id = '$album_id'");
            while($row = mysqli_fetch_array($table)) { 

              $photo_id=$row['photo_id'];
              $photo_link=$row['photo_link'];
            ?>
            <div class="col-lg-2 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
              <div class="card" style="width: 100%;">
                <a href="dashboard/<?php echo $row['photo_link'] ?>">
                  <img class="image" src="dashboard/<?php echo $row['photo_link'] ?>" style="width: 100%; height:140px;" alt="Avatar">
                </a>
              </div>
             </a>
            </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- #services -->

  </main>
  <?php include 'links/footer.php'; ?>
  <?php include 'links/_js.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


