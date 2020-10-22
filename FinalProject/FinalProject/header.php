<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
.grid-container {
  //*display: grid;
  grid-template-columns: 25% 25% 25%;
  grid-template-rows: 50% 50%;
  *//
  
  display: flex;
  flex-wrap: wrap-reverse;
  background-color: DodgerBlue;
  grid-gap: 1px;
  background-color: #2196F3;
  padding: 5px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 1vw;}

div{ 
  display: box-sizing: border-box;
  text-align: left;
  width: 50%;
  background-color: #e5f7f0;
  padding: center;
  margin: 1rem auto;
}
.error {color: #FF0000;
}
nav{ 
  display: box-sizing: border-box;
  text-align: center;
  width: 100%;
  background-color: #e5f7f0;
  padding: 15px;
  margin: 1rem auto;
  }
P{
  display: box-sizing: border-box;
  text-align: center;

}
body {
  display: box-sizing: border-box;
  background-image: url("Photos-101.jpg");
  background-repeat: no-repeat;
  background-size: 100%, 600px;
}


</style>
</head>
<body>
	<div id="navigation">
		<ul>
			<li><a href="index.php">Home Page</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="view_users.php">View Users</a></li>
			<li><a href="password.php">Change Password</a></li>
			<li><?php // Create a login/logout link:
if ( (isset($_SESSION['user_id'])) && (basename($_SERVER['PHP_SELF']) != 'logout.php') ) {
	echo '<a href="logout.php">Logout</a>';
} else {
	echo '<a href="login.php">Login</a>';
}
?>
<?
if ($_SESSION['user_id'] == 2) {
  echo '<li><a href="newblogposts.php">New Blogpost</a></li>';
}
?>
		</ul>
	</div>
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 12.7 - header.html -->