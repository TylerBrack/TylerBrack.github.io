
<?php
include ('header.php');

// define variables and set to empty values
$fruits = $nameErr = $emailErr = $genderErr = $websiteErr = "";
$fruit = $name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["fruit"])) {
    $fruits = "Fruit is required";
  } else {
    $fruit = test_input($_POST["fruit"]);
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2 class="title">PHP Form</h2>
<p><span class="error">* required field</span></p>
<div id="form">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Fruit:
  <input type="checkbox" name="fruit" <?php if (isset($fruit) && $fruit=="apple") echo "checked";?> value="apple">Apple
  <input type="checkbox" name="fruit" <?php if (isset($fruit) && $fruit=="watermelon") echo "checked";?> value="watermelon">Watermelon
  <input type="checkbox" name="fruit" <?php if (isset($fruit) && $fruit=="grapes") echo "checked";?> value="grapes">Grapes
  <span class="error">* <?php echo $fruits;?></span>
  <br><br>
  <form action="array_sticky_example.php" method="post">

  <?php
//Array Sticky Helper Code - Sam Goerke
//This assumes your posted value is 'day' and your created array is called $daysarray
$months = range(1, 12);
$monthsdefualt = array ('Month');
$monthsarray = array_merge($monthsdefualt, $months);

//outputs the opening html tag for a dropdown menu
echo "<select name=\"Month\">";

//loops through array and checks to see if the POSTed value for 'day' is equal to the current value in the dropdown loop
foreach ($monthsarray as $value){
	if ($_REQUEST['Month'] == $value){
		//current option in dropdown menu was the POST value... make a variable $isselected set to the html value of selected
		$isselected = "selected";}
	else{
		//current option in dropdown menu was NOT the POST value... make a variable $isselected set to nothing
		$isselected = "";
	}
	//output the html option tag, with the variable $isselected in it, this will put the tag 'selected' in the sticky value and none of the others
	echo "<option value=\"$value\" $isselected>$value"."</option>\n";
}
echo "</select>";
?>

<?php
//Array Sticky Helper Code - Sam Goerke
//This assumes your posted value is 'day' and your created array is called $daysarray
$days = range(1, 31);
$daysdefualt = array ('Day');
$daysarray = array_merge($daysdefualt, $days);

//outputs the opening html tag for a dropdown menu
echo "<select name=\"day\">";

//loops through array and checks to see if the POSTed value for 'day' is equal to the current value in the dropdown loop
foreach ($daysarray as $value){
	if ($_REQUEST['day'] == $value){
		//current option in dropdown menu was the POST value... make a variable $isselected set to the html value of selected
		$isselected = "selected";}
	else{
		//current option in dropdown menu was NOT the POST value... make a variable $isselected set to nothing
		$isselected = "";
	}
	//output the html option tag, with the variable $isselected in it, this will put the tag 'selected' in the sticky value and none of the others
	echo "<option value=\"$value\" $isselected>$value"."</option>\n";
}
echo "</select>";
?>

<?php
//Array Sticky Helper Code - Sam Goerke
//This assumes your posted value is 'day' and your created array is called $daysarray
$years = range(2020, 1900);
$yearsdefualt = array ('Year');
$yearsarray = array_merge($yearsdefualt, $years);

//outputs the opening html tag for a dropdown menu
echo "<select name=\"Year\">";

//loops through array and checks to see if the POSTed value for 'day' is equal to the current value in the dropdown loop
foreach ($yearsarray as $value){
	if ($_REQUEST['Year'] == $value){
		//current option in dropdown menu was the POST value... make a variable $isselected set to the html value of selected
		$isselected = "selected";}
	else{
		//current option in dropdown menu was NOT the POST value... make a variable $isselected set to nothing
		$isselected = "";
	}
	//output the html option tag, with the variable $isselected in it, this will put the tag 'selected' in the sticky value and none of the others
	echo "<option value=\"$value\" $isselected>$value"."</option>\n";
}
echo "</select>";
?>
<br><br>



  <input type="submit" name="submit" value="Submit">  
</form>

<?php
if (($_POST['name'] !="") && ($_POST['email'] !="") && ($_POST['website'] !="") && ($_POST['comment'] !="") && ($_POST['gender'] !="") && ($_POST['fruit'] !="")) {
          echo "<h2>Your Input:</h2>";
          echo "Nice job completing the form!";
          echo "<br>";
          echo $name;
          echo "<br>";
          echo $email;
          echo "<br>";
          echo $website;
          echo "<br>";
          echo $comment;
          echo "<br>";
          echo $gender;
          echo "<br>";
          echo $fruit;
          include ('footer.php');
}
?>
</div>
