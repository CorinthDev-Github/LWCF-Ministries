
<?php
//insert.php
if(isset($_POST["name"]))
{
 include("../credentials/connection.php");
 $name = mysqli_real_escape_string($conn, $_POST["name"]);
 $encouragement_concern = mysqli_real_escape_string($conn, $_POST["encouragement_concern"]);
 $posted_by = mysqli_real_escape_string($conn, $_POST["posted_by"]);
 $query = "
 INSERT INTO dashboard_encouragement(name, encouragement_concern, posted_by)
 VALUES ('$name', '$encouragement_concern', '$posted_by')
 ";
 mysqli_query($conn, $query);
}
?>