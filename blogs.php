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
    
    <section id="facts">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Blogs</h3>
          <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus, ad pro quaestio laboramus. Ei ubique vivendum pro. At ius nisl accusam lorenta zanos paradigno tridexa panatarel.</p>
        </header>

        <div class="row">
          <?php
            include 'credentials/connection.php';
            $query = mysqli_query($conn, "SELECT * FROM dashboard_publishedworks");

            while ($row = mysqli_fetch_array($query)) {
              
              $id = $row['id'];
              $title = $row['title'];
              $post = $row['post'];
              $picture = $row['picture'];
              $date_posted = $row['date_posted'];
              $author = $row['author'];
              $article = $row['article'];

            ?>
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s"><br>
             <a href="blogs_view.php?id=<?php echo $row['id']; ?>">
              <div class="card">
                <img class="image" src="dashboard/news_upload/<?php echo $row['picture']; ?>" style="width: 100%; height: 300px;" alt="Avatar">
                <div class="container"><br>
                  <h4 style="color: black;" class="text-center">Title: <b><?php echo $row['title']; ?></b></h4> 
                  <p class="text-center"><b>Author: <?php echo $row['author']; ?></b></p>
                  <p class="text-center" style="color: black;"><b>Article: <?php echo $row['article']; ?></b></p>
                  <p class="text-center" style="color: gray;"><?php echo $row['date_posted']; ?></p>
                </div>
              </div>
             </a>
            </div>
          <?php } ?>

        </div>

      </div><br><br>
    </section><!-- #services -->

  </main>
  <?php include 'links/footer.php'; ?>
  <?php include 'links/_js.php'; ?>
  <script type="text/javascript">
  function myFunction() {
      if (confirm("You will need to sign in first!")) {
          location.href='credentials/';
      } else {
          location.href='#!';
      }    
  }
  </script>


