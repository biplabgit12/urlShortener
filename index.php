<?php
//    //Connect to the database
//    $servername = "localhost";
//    $username = "root";
//    $password = "";
//    $database = "shortener";
// 	$con = mysqli_connect($servername,$username,$password,$database);
// 	if (!$con) {
// 	  echo "not Connected";
// 	}
  
 include('db_connect.php');


//    print_r($_GET);
// 	die();
  if (isset($_GET)){
	 foreach ($_GET as $key => $value) {
		 $link = mysqli_real_escape_string($con, $key);   //security purpose use
		 $link = str_replace('/','',$link);
		//  echo 'key is '. $link;
	}
	// die();

	  $sql = "SELECT link FROM `urlshortener` WHERE short_link ='$link'";
	   $result = mysqli_query($con, $sql);
   
	   $count = mysqli_num_rows($result);
	  if ($count > 0) {
		  $rows = mysqli_fetch_assoc($result);
		  $db_link = $rows['link'];
  
		  $sql = "UPDATE `urlshortener` SET `hit_link` = `hit_link` + 1 WHERE short_link = '$link'";
		   mysqli_query($con, $sql);
		  header('location:'.$db_link);
		  die();
	  }
	   
  
	 }
  
  

?>