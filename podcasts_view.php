  <?php include 'links/_css.php'; ?>
  <?php include 'links/page_header.php'; ?>
  <main id="main">


    <!--==========================
      Featured Services Section
    ============================-->
    
   <?php include 'links/feature.php'; ?>

    <!--==========================
      Services Section
    ============================-->
    
    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Podcasts</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>

        <div class="row counters">
          <?php 

          include 'credentials/connection.php';
          if (isset($_GET['id'])) {
            $query = mysqli_query($conn, "SELECT * FROM dashboard_podcasts WHERE id = '".$_GET["id"]."'");
            while($row = mysqli_fetch_array($query))
                {   
                    $id=$row['id'] ;
                    $title=$row['title'];
                    $video=$row['video'];
                }
                echo '
                  <div class="container"><br>
                    <p>WATCH & LISTEN | VIDEO/MUSIC</p>
                    <h4 style="color: black;" class="text-center"><b>'.$title.'</b></h4> 
                    <p><video width = "100%" controls><source src="dashboard/uploaded/'.$video.'" type="video/webm"></video></p>
                    <p class="text-center" style="color: gray;"></p>
                  </div>
                ';
          }

          ?>
        </div>

      </div><br><br>
    </section><!-- #facts -->

  </main>
  <?php include 'links/footer.php'; ?>
  <?php include 'links/_js.php'; ?>


