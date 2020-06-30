
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo">
          <img src="" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdownprayer" href="#" data-toggle="dropdown">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count" id="countingPrayer"></span>
            </a>
            <div id="menuPrayer" class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdownprayer">
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdownenc" href="#" data-toggle="dropdown">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count" id="countingEnc"></span>
            </a>
            <div id="menuEnc" class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdownenc">
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count" id="counting"></span>
            </a>
            <div id="menus" class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown"> 

            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, <?php echo $_SESSION['user']['fullname']; ?></span>
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
                    <img src='photos/<?php echo $row['picture']; ?>' class="img-xs rounded-circle">
              <?php } ?> 
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item mt-2" href="settings_accounts.php">
                Manage Accounts
              </a>
              <a class="dropdown-item" href="../credentials/logout.php">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>