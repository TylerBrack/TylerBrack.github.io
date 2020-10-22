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
    $user_id = mysqli_real_escape_string($dbc,trim($_SESSION['user_id']));
    $blogpost_title = mysqli_real_escape_string($dbc,trim($_POST['title']));
    $blogpost_body = mysqli_real_escape_string($dbc,trim($_POST['blogpost_body']));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $query = "INSERT INTO blogposts(blogpost_id, user_id, blogpost_title, blogpost_body, blogpost_timestamp) 
  VALUES ('','$user_id','$blogpost_title','$blogpost_body',NOW())";
  echo $query;
  $results = mysqli_query($dbc,$query);



}

?>
<p><span class="error">* required field</span></p>
<div id="form">
<form method="post" action="newblogposts.php">  
Enter title: <br>
<input type="text" name="title" />
  <br>
  Blogpost: <textarea name="blogpost_body" rows="5" cols="40"></textarea></textarea>
  <br><br>
  <br><br>

  <input type="submit" name="submit" value="Submit">  

<?php include ('footer.php'); ?>