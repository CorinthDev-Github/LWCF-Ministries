
<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("../credentials/connection.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE dashboard_prayerconcern SET comment_status=1 WHERE comment_status=0";
  mysqli_query($conn, $update_query);
  exit();
 }
 $query = "SELECT * FROM dashboard_prayerconcern  ORDER BY id DESC LIMIT 5";
 $result = mysqli_query($conn, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

     <li style = "width: 250px;">
      <a style = "text-decoration: none; color: black" ><hr>
         &nbsp;&nbsp;&nbsp;NEW PRAYER REQUEST<br/>
         &nbsp;&nbsp;&nbsp;Concern by: '.$row["posted_by"].'<br />
         &nbsp;&nbsp;&nbsp;<small>'.$row["date_posted"].'</small>
      </a>
     </li><hr>
     <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<br/><li style = "width: 250px;"><center><a class="text-bold text-italic">NO PRAYER REQUEST FOUND!</a></center></li>';
 }
 
 $query_1 = "SELECT * FROM dashboard_prayerconcern WHERE comment_status=0";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>