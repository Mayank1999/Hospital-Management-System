<?php
session_start();

// initializing variables
$name = "";
$username = "";
$password = "";
$docid = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hospital management system');


// LOGIN USER
if (isset($_POST['reg'])) {
  $docid = mysqli_real_escape_string($db, $_POST['docid']);

  if (empty($docid)) {
  	array_push($errors, "DOC-ID is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM dochospital WHERE docid='$docid'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) 
	{
		$name = $_POST['name'];
		$username = $_POST['uname'];
		$password = $_POST['pass'];
		if(!empty($name) || !empty($username) || !empty($password))
		{
			$host = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbname = "hospital management system";
	
			$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
			if(mysqli_connect_error()){
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());	
			}else{
			$SELECT = "SELECT username,docid from doctors Where docid = ? and username = ? Limit 1";
			$INSERT = "INSERT Into doctors (name, username, password, docid) values(?,?,?,?)";
		
			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("ss", $docid, $username);
			$stmt->execute();
			$stmt->bind_result($docid, $username);
			$stmt->store_result();
			$rnum = $stmt->num_rows;
	
			if($rnum==0){
				$stmt->close();
			
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("ssss", $name, $username, $password, $docid);
				$stmt->execute();
				echo "New record inserted SUCCESSFULLY :)";		
			}else{
				echo "Username or DOC-ID already registered";
			}
			$stmt->close();
			$conn->close();
		}
		}
		else
		{
			echo "All fields are required";
			die();
		}
  	}else {
  		array_push($errors, "No docid");
		echo "PLEASE ENTER VALID DOC-ID!!!";
  	}
  }
}

?>
