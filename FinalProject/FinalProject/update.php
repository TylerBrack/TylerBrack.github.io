<?php 
session_start();
if ($_SESSION['user_id'] != 2) {
    header('Location: https://tlbrack.uwmsois.com/FinalProject/login.php');
}
include ('header.php'); 
include ('mysqli_connect.php');
?>



<?php
// define variables and set to empty values
 
 $blogpost_body = mysqli_real_escape_string($dbc,trim($_POST['blogpost_body']));
 $blogpost_id = mysqli_real_escape_string($dbc,trim($_GET['blogpost_id']));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

  $query = "UPDATE blogposts SET blogpost_body = '$blogpost_body' WHERE blogpost_id = '$blogpost_id'";
  //echo $query;
  $results = mysqli_query($dbc,$query);
if ($results){
  echo "it worked";
}else{
  echo "nope". mysqli_error($dbc);
}
}
?>
<?
if (isset($blogpost_id)){
  $sticky_query = "SELECT blogpost_body FROM blogposts WHERE blogpost_id = ". $blogpost_id;
  $sticky_results= mysqli_query($dbc,$sticky_query);
  $sticky_row = mysqli_fetch_array($sticky_results,MYSQLI_ASSOC);
  $sticky_blogpost = $sticky_row['blogpost_body'];
}

?>


<p><span class="error">* required field</span></p>
<div id="form">
<form method="post" action="update.php?blogpost_id=<?php echo $blogpost_id; ?>"; 
<h2> Please Update </h2>

  Comment: <textarea name="blogpost_body" rows="5" cols="40"><?php echo $sticky_blogpost;?> </textarea>
  <br></br>
  
  <br><br>

  <input type="submit" name="submit" value="Submit">  




<?php include ('footer.php'); ?>