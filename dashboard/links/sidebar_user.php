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
              <small class="designation text-muted">User</small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="profile.php">
        <i class="menu-icon mdi mdi-account"></i>
        <span class="menu-title">Profile</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="published_createblog.php">User Published Works</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="prayer_request.php">User Prayer Request</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="encouragement.php">User Encouragement Posts</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="prayer_encourage_user.php">
        <i class="menu-icon mdi mdi-access-point-network"></i>
        <span class="menu-title">Prayer and Encourage Portal</span>
      </a>
    </li>
  </ul>
</nav>