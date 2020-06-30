  <?php 

  include 'credentials/connection.php';
  session_start();
  if(isset($_POST['btn_submit'])) {

    $_SESSION['success'] = "Hello! Thank you for getting in touch with us.";
    $_SESSION['warning'] = "We will reply to your email as soon as we can.";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO website_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $query = mysqli_query($conn, $sql);
    header("location: contact.php");
    exit();

  }
  mysqli_close($conn);
  ?>
  <?php include 'links/_css.php'; ?>
  <?php include 'links/page_header.php'; ?>
  <main id="main">

    
    <!--==========================
      Featured Services Section
    ============================-->
    
    <section id="featured-services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 box">
            <br>
          </div>
        </div>
      </div>
    </section><!-- #featured-services -->
    
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Support Us</h3>
              <address>Address</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="#!">+6391 2345 6789</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="#!">info@example.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
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
          <?php if (isset($_SESSION['warning'])) : ?>
            <div class="warning" id="flash-msg">
              <p class="alert alert-warning">
                <?php 
                  echo $_SESSION['warning']; 
                  unset($_SESSION['warning']);
                ?>
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              </p>
            </div>
          <?php endif ?>
          <form action="contact.php" method="POST" role="form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"  required/>
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"  required/>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"  required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><input type="submit" name="btn_submit" value = "Send Message" class="btn btn-primary" /></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>
  <?php include 'links/footer.php'; ?>
  <?php include 'links/_js.php'; ?>

