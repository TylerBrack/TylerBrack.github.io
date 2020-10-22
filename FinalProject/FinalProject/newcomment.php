<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: https://tlbrack.uwmsois.com/FinalProject/login.php');
}
include ('header.php'); 
include ('mysqli_connect.php');
?>

<?php
// define variables and set to empty values
    $user_id = mysqli_real_escape_string($dbc,trim($_SESSION['user_id']));
    $blogpost_id = mysqli_real_escape_string($dbc,trim($_GET['blogpost_id']));
    $comment_body = mysqli_real_escape_string($dbc,trim($_POST['comment']));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $query = "INSERT INTO comments (comment_id, user_id, blogpost_id, comment_body, comment_timestamp) VALUES ('','$user_id','$blogpost_id','$comment_body',NOW())";
  echo $query;
  $results = mysqli_query($dbc,$query);



}

?>
<p><span class="error">* required field</span></p>
<div id="form">
<form method="post" action="newcomment.php?blogpost_id=<?php echo $blogpost_id; ?>">  
  
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea></textarea>
  <br><br>
  <br><br>

  <input type="submit" name="submit" value="Submit">  

<?php include ('footer.php'); ?>