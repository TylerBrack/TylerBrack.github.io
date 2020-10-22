<?php

//This includes the header and mysqldatabase.
include('header.php');
include('mysqli_connect.php');

//Get whatever information you need from either GET, SESSION, or POST
$blogid = mysqli_real_escape_string($dbc, trim($_GET['blogpost_id']));

//Your SQL Query
$query = "SELECT * FROM comments WHERE blogpost_id =". $blogid;
$result = mysqli_query ($dbc, $query);

//Your loop to display everything
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<div class=\"grid-container\">";
	//echo  "<div>". $row['blogpost_title']."</div>"; 
	echo  "<div>". $row['comment_body']."</div>"; 
	echo  "<div>". $row['blogpost_timestamp'] ."</div>";
	echo  "<div>". $row['first_name']. "</div>";
  
	
	echo  "</div>";
	}


?>