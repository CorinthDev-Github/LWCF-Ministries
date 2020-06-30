<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <?php 

          $servername = "localhost";
          $username = "root";
          $password = "";
          $db = "lwcf";

          // Create connection
          $conn = mysqli_connect($servername, $username, $password, $db);

          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $client = $_SESSION['user']['fullname'];
          $result = mysqli_query($conn, "SELECT * FROM profile_picture WHERE credits_by = '$client' ORDER BY id DESC LIMIT 1");

          while ($row = mysqli_fetch_array($result)) {
            $picture=$row['picture'];
            ?>
          <div class="profile-image" >
            <img src='photos/<?php echo $row['picture']; ?>' class="img-xs rounded-circle">
          </div>
          <?php } ?>
          <div class="text-wrapper">
            <p class="profile-name"><?php echo $_SESSION['user']['fullname']; ?></p>
            <div>
              <small class="designation text-muted">Admin</small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="user_registered.php">
        <i class="menu-icon mdi mdi-account"></i>
        <span class="menu-title">Users</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="news_announcement.php">
        <i class="menu-icon mdi mdi-newspaper"></i>
        <span class="menu-title">News & Announcement</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="gallery.php">
        <i class="menu-icon mdi mdi-vector-arrange-above"></i>
        <span class="menu-title">Gallery</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="podcasts.php">
        <i class="menu-icon mdi mdi-access-point"></i>
        <span class="menu-title">Podcasts</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="resource_material.php">
        <i class="menu-icon mdi mdi-rocket"></i>
        <span class="menu-title">Resource Materials</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="prayer_encourage.php">
        <i class="menu-icon mdi mdi-access-point-network"></i>
        <span class="menu-title">Prayer and Encourage Portal</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="website_messages.php">
        <i class="menu-icon mdi mdi-message"></i>
        <span class="menu-title">Messages</span>
      </a>
    </li>
  </ul>
</nav>