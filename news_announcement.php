
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">News and Announcement</h3>
        </header>

        <!-- <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div> -->

        <div class="row portfolio-container">
          <?php
            include 'credentials/connection.php';
            $table = mysqli_query($conn, "SELECT * FROM dashboard_newsannouncement ORDER BY id DESC LIMIT 6");
            while($row = mysqli_fetch_array($table)) { 

              $id=$row['id'];
              $title=$row['title'];
              $description=$row['description'];
              $date_posted=$row['date_posted'];
              $image=$row['picture'];
            ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
              <div class="portfolio-wrap">
                <figure>
                  <img src='dashboard/news_upload/<?php echo $row['picture']; ?>' class="img-fluid">
                  <a href="dashboard/news_upload/<?php echo $row['picture']; ?>" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="news_announcementview.php?id=<?php echo $row['id']; ?>" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </figure>

                <div class="portfolio-info">
                  <h4>Title: <?php echo $row['title']?></h4>
                  <p>Date Posted: <?php echo $row['date_posted']?></p>
                </div>
              </div>
            </div>
          <?php }?>

        </div>

        <div class="row">
          <div class="col-md-12">
            <a href="news_announcementpage.php" role = "button" class="btn-get-started scrollto" style="float: right;">
              <strong>SEE ALL POSTS</strong>
            </a>
          </div>
        </div>

      </div>
    </section><!-- #portfolio -->