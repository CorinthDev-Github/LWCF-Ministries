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
      <a class="nav-link text-muted">
        <span class="menu-title">Prayer & Encouragement Portal</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="menu-icon mdi mdi-home"></i>
        <span class="menu-title">Home</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="portal_prayeradmin.php">
        <i class="menu-icon mdi mdi-palette"></i>
        <span class="menu-title">Prayer Requests</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="portal_encouragementadmin.php">
        <i class="menu-icon mdi mdi-palette-advanced"></i>
        <span class="menu-title">Encouragement</span>
      </a>
    </li>
  </ul>
</nav>