
<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("../credentials/connection.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE dashboard_commentenc SET comment_status=1 WHERE comment_status=0";
  mysqli_query($conn, $update_query);
  exit();
 }
 $query = "SELECT * FROM dashboard_commentenc  ORDER BY comment_id DESC LIMIT 5";
 $result = mysqli_query($conn, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

     <li style = "width: 400px; border: solid black 1px; border-radius: 5px;">
      <a style = "text-decoration: none; color: black" >
         &nbsp;<strong>'.$row["comment_subject"].'</strong> comment about <b>'.$row["type_concern"].'</b> to <b>'.$row["name_enc"].'</b> <br />
         &nbsp;<small>'.$row["date_posted"].'</small><br />
      </a>
     </li>
     <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<br/><li style = "width: 190px;"><center><a class="text-bold text-italic">No Notification Found</a></center></li>';
 }
 
 $query_1 = "SELECT * FROM dashboard_commentenc WHERE comment_status=0";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>