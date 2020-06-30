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
          <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus, ad pro quaestio laboramus. Ei ubique vivendum pro. At ius nisl accusam lorenta zanos paradigno tridexa panatarel.</p>
        </header>

        <div class="row">
          <?php
            $mysqli = new mysqli("localhost", "root", "", "lwcf");
            if (isset($_GET['add_album_action'])) {
            if ($_GET['add_album_action'] == "successfull") { ?>
            <br>New album created!<br><br>
            <?php }
            }
            ?>
            <?php
            $albums = $mysqli->query("SELECT * FROM gallery_albums ORDER BY album_id DESC LIMIT 6");
            while ($album_data = $albums->fetch_assoc()) {
            $photos = $mysqli->query("SELECT * FROM gallery_photos WHERE album_id = ".$album_data['album_id']."");?>
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
             <a class="btn btn-secondary" href="gallery_viewalbum.php?album_id=<?php echo $album_data['album_id'] ?>">
              <div class="card">
                <img class="image" src="dashboard/gallery_cover/<?php echo $album_data['image']; ?>" style="width: 100%; height: 200px;" alt="Avatar">
                <div class="container"><br>
                  <h4 style="color: black;"><b><?php echo $album_data['album_name'] ?></b></h4> 
                  <p style="color: black;">(<?php echo $photos->num_rows; ?>)</p> 
                </div>
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


