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
          <h3>News & Announcement</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>

        <div class="row counters">
          <?php 

          include 'credentials/connection.php';
          if (isset($_GET['id'])) {
            $query = mysqli_query($conn, "SELECT * FROM dashboard_newsannouncement WHERE id = '".$_GET["id"]."'");
            while($row = mysqli_fetch_array($query))
                {   
                    $id=$row['id'] ;
                    $title=$row['title'];
                    $description=$row['description'];
                    $date_posted=$row['date_posted'];
                    $posted_by=$row['posted_by'];
                
                ?>
                <div class="container"><br>
                  <p><b>News & Announcement | by: <?php echo $row['posted_by']; ?></b></p>
                  <p><b>Date: <?php echo $row['date_posted']; ?></p>
                  <h4 style="color: black;" class="text-center"><b>Title: <?php echo $row['title']; ?></b></h4> 
                  <textarea class="form-control" rows="10" readonly><?php echo $row['description']; ?></textarea>
                </div>
         <?php } }?>
        </div>

      </div><br><br>
    </section><!-- #facts -->

  </main>
  <?php include 'links/footer.php'; ?>
  <?php include 'links/_js.php'; ?>


