<?php
session_start();

// initializing variables
$username = "";
$docname = "";
$healthissue = "";
$medication = "";
$dateofapp = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hospital management system');

// REGISTER USER
if (isset($_POST['sub'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $docname = mysqli_real_escape_string($db, $_POST['docname']);
  $healthissue = mysqli_real_escape_string($db, $_POST['healthissue']);
  $medication = mysqli_real_escape_string($db, $_POST['medication']);
  $dateofapp = mysqli_real_escape_string($db, $_POST['dateofapp']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($docname)) { array_push($errors, "Doctor's name is required"); }
  if (empty($healthissue)) { array_push($errors, "Health Issue is required"); }
  if (empty($medication)) { array_push($errors, "Medication is required"); }
  if (empty($dateofapp)) { array_push($errors, "Date of application is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM patreport WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO patreport (Username, docname, healthissue, medication, dateofapp) 
				VALUES('$username', '$docname', '$healthissue', '$medication' , '$dateofapp')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Report Submitted";
	echo "Report Submitted";
  	header('location: weldoc.php');
  }
}

