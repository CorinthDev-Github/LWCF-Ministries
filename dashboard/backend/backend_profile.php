<?php
  // Create Connection
  include '../../credentials/connection.php';

  error_reporting(0);

  if (isset($_POST['btn_submit'])) {
          
          $_SESSION['success'] = "NEW PROFILE ADDED!";
          $result = "";
          $image = 'photos/'.$_FILES['image']['name'];
          $image=mysqli_real_escape_string($conn,$image);
          $fname = $_POST['fname'];
          $age = $_POST['age'];
          $bday = $_POST['bday'];
          $email = $_POST['email'];
          $tof = $_POST['tof'];
        
        if(preg_match("!image!", $_FILES['image']['type'])){
          if(copy($_FILES['image']['tmp_name'], $image)){
            $sql = "INSERT INTO dashboard_profile (fname, age, bday, email, tof, photo)
            VALUES ('$fname', '$age', '$bday', '$email', '$tof', '$image')";
            if (mysqli_query($conn,$sql)) {
              $result = "Image Successfully Uploaded!";
            }
            else {
              $result = "Image Upload Failed!";
            }
          }
          else {
            $result="Image Upload Failed!";
          }
        }
        else {
          $result = "Only Upload JPG, PNG & GIF Images!";
        }
      }
      mysqli_close($conn);
  ?>