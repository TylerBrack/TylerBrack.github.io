<?php
session_start();
//header
include('header.php');
include ('mysqli_connect.php');

//If a user name is entered display login mesage
	if (isset($_SESSION['first_name'])) {
		echo "You currently logged in as {$_SESSION['first_name']}. Welcome to our website!";
}

if (isset($_GET['delete_id'])){
	$delete_id = mysqli_real_escape_string($dbc,trim($_GET['delete_id']));

	$delete_query = "DELETE FROM blogposts WHERE blogpost_id =". $delete_id;
	$delete_results = mysqli_query($dbc,$delete_query);
	if ($delete_results){
	  echo "YOUR COMMENT HAS BEEN DELETED";
	}
  
  }

//***********************************************
//PAGINATION SETUP START
//From Textbook Script 10.5 - #5
//***********************************************

// Number of records to show per page:
$display = 5;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
$pages = $_GET['p'];
} else { // Need to determine.
// Count the number of records:
$q = "SELECT COUNT(blogpost_id) FROM blogposts";
$r = mysqli_query ($dbc, $q);
$rowp = mysqli_fetch_array ($r, MYSQLI_NUM);
$records = $rowp[0];
// Calculate the number of pages...
if ($records > $display) { // More than 1 page.
$pages = ceil ($records/$display);
} else {
$pages = 1;
}
} // End of p IF.

// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
$start = $_GET['s'];
} else {
$start = 0;
}

//***********************************************
//PAGINATION SETUP END
//***********************************************

//***********************************************
//SORTING SETUP START
//From Textbook Script 10.5 - #5
//***********************************************

// Determine the sort...
// Default is by registration date.
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'date';

// Determine the sorting order:
switch ($sort) {
case 'recent':
$order_by = 'blogpost_timestamp DESC';
break;

case 'oldest':
$order_by = 'blogpost_timestamp ASC';
break;


default:
$order_by = 'blogpost_timestamp DESC';
$sort = 'recent';
break;
}

//Sort buttons
echo '<div align="center">';
echo '<strong> Sort By: </strong>';
echo '<a href="?sort=recent">Most Recent</a> |';
echo '<a href="?sort=oldest">Oldest</a> |';

echo '</div>';

//***********************************************
//SORTING SETUP END
//***********************************************

$query = "SELECT * FROM blogposts ORDER BY $order_by LIMIT $start, $display";
//$query = "SELECT * FROM users LIMIT $start, $display";

$results = mysqli_query($dbc,$query);

while ($row = mysqli_fetch_array($results,MYSQLI_ASSOC)){
	echo "<div class=\"grid-container\">";
	//echo  "<div>". $row['blogpost_title']."</div>"; 
	echo  "<div>". $row['blogpost_body']."</div>"; 
	echo  "<div>". $row['blogpost_timestamp'] ."</div>";
	echo  "<div>"."<a href='viewcomments.php?blogpost_id=". $row['blogpost_id']."'>View comments</a>"."</div>";
	
	if ($_SESSION['user_id'] == 2) {
    echo  "<div>"."<a href='update.php?blogpost_id=". $row['blogpost_id']."'>Update blogpost</a>"."</div>";
	}
    if ($_SESSION['user_id'] == 2) {	
  	echo  "<div>"."<a href='index.php?delete_id=". $row['blogpost_id']."'>Delete blogpost</a>"."</div>";
	}
	if (isset($_SESSION['user_id'])) {
    echo  "<div>"."<a href='newcomment.php?blogpost_id=". $row['blogpost_id']."'>New comments</a>"."</div>";
	}
	echo  "</div>";
}	




//header
//***********************************************
//PAGINATION PREVIOUS AND NEXT PAGE BUTTONS/LINKS START
//***********************************************

// Make the links to other pages, if necessary.
if ($pages > 1) {

	echo '<br /><p>';
	$current_page = ($start/$display) + 1;
	
	// If it's not the first page, make a Previous button:
	if ($current_page != 1) {
	echo '<a href="?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
	}
	
	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) {
	if ($i != $current_page) {
	echo '<a href="?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
	} else {
	echo $i . ' ';
	}
	} // End of FOR loop.
	
	// If it's not the last page, make a Next button:
	if ($current_page != $pages) {
	echo '<a href="?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
	}
	
	echo '</p>'; // Close the paragraph.
	
	} // End of links section.
	
	//***********************************************
	//PAGINATION PREVIOUS AND NEXT PAGE BUTTONS/LINKS END
	//***********************************************
?>



	<?php include ('footer.php'); ?>