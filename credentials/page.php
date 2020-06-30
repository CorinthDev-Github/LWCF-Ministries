<!DOCTYPE html>
<html>
<head>
	<title>Pagination</title>
</head>
<body style="text-align: center; padding: 40px;">
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
	
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}

	if($page == '' || $page == 1 ){
		$page1 = 0;
	}else{
		$page1 = ($page*10)-10;
	}

	$sql = ($conn,"SELECT * FROM dashboard_newsannouncement ORDER BY id DESC LIMIT '.$page1.',6");
	while($row = mysqli_fetch_array($table)) { 

              $id=$row['id'];
              $title=$row['title'];
           
       		echo "$title";

        }

?>
</body>
</html>