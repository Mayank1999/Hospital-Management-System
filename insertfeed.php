<?php
session_start();

// initializing variables
$name = "";
$patrel = "";
$rating = "";
$issues = "";
$suggestions = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hospital management system');

// REGISTER USER
if (isset($_POST['sub'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $patrel = mysqli_real_escape_string($db, $_POST['patrel']);
  $rating = mysqli_real_escape_string($db, $_POST['rating']);
  $issues = mysqli_real_escape_string($db, $_POST['issues']);
  $suggestions = mysqli_real_escape_string($db, $_POST['suggestions']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($patrel)) { array_push($errors, "Patient Relation is required"); }
  if (empty($rating)) { array_push($errors, "Rating is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM feedback WHERE name='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO feedback (name, patrel, rating, issues, suggestions) 
				VALUES('$name', '$patrel', '$rating', '$issues' , '$suggestions')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "Report Submitted";
	echo "Feedback Submitted";
  	header('location: welpat.php');
  }
}

