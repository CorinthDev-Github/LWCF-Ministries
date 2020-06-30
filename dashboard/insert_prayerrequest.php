
<?php
//insert.php
if(isset($_POST["name"]))
{
 include("../credentials/connection.php");
 $name = mysqli_real_escape_string($conn, $_POST["name"]);
 $prayer_concern = mysqli_real_escape_string($conn, $_POST["prayer_concern"]);
 $posted_by = mysqli_real_escape_string($conn, $_POST["posted_by"]);
 $query = "
 INSERT INTO dashboard_prayerconcern(name, prayer_concern, posted_by)
 VALUES ('$name', '$prayer_concern', '$posted_by')
 ";
 mysqli_query($conn, $query);
}
?>