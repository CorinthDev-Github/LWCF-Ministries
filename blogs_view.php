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
          <h3>BLOGS</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>

        <div class="row counters">
          <?php 

          include 'credentials/connection.php';
          if (isset($_GET['id'])) {
            $query = mysqli_query($conn, "SELECT * FROM dashboard_publishedworks WHERE id = '".$_GET["id"]."'");
            while($row = mysqli_fetch_array($query))
                {   
                    $id=$row['id'] ;
                    $title=$row['title'];
                    $author=$row['author'];
                    $article=$row['article'];
                    $date_posted=$row['date_posted'];
                    $post=$row['post'];
                
                ?>
                <div class="container"><br>
                  <div class="row">
                    <div class="col-md-3">
                      <p><b><?php echo $row['author']; ?> | BLOG </b></p>
                      <p><b><?php echo $row['date_posted']; ?>, ARTICLE <?php echo $row['article']; ?></b></p>
                      <h4 style="color: black;"><b>Title: <?php echo $row['title']; ?></b></h4> 
                    </div>
                    <div class="col-md-9">
                      <img class="image" src="dashboard/news_upload/<?php echo $row['picture']; ?>" style="float: right; width: 30%; height: 130px;" alt="Avatar">
                    </div>
                  </div>
                  <textarea class="form-control" rows="10" readonly><?php echo $row['post']; ?></textarea>
                </div>
         <?php } }?>
        </div>

      </div><br><br>
    </section><!-- #facts -->

  </main>
  <?php include 'links/footer.php'; ?>
  <?php include 'links/_js.php'; ?>


