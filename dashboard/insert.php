
<?php
//insert.php
if(isset($_POST["subject"]))
{
 include("../credentials/connection.php");
 $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
 $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
 $name_enc = mysqli_real_escape_string($conn, $_POST["name_enc"]);
 $concern_enc = mysqli_real_escape_string($conn, $_POST["concern_enc"]);
 $type_concern = mysqli_real_escape_string($conn, $_POST["type_concern"]);
 $query = "
 INSERT INTO dashboard_commentenc(comment_subject, comment_text, name_enc, concern_enc, type_concern)
 VALUES ('$subject', '$comment', '$name_enc', '$concern_enc', '$type_concern')
 ";
 mysqli_query($conn, $query);
}
?>