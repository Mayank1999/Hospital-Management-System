<?php
$name = $_POST['name'];
$username = $_POST['uname'];
$password = $_POST['pass'];
$gender = $_POST['sex'];
$dob = $_POST['dob'];
$mobile = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];

if(!empty($name) || !empty($username) || !empty($password) || !empty($gender) || !empty($dob) || !empty($mobile) || !empty($address))
{
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "hospital management system";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	
	if(mysqli_connect_error()){
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());	
	}else{
		$SELECT = "SELECT Username from patients Where Username = ? Limit 1";
		$INSERT = "INSERT Into patients (Name, Username, Password, Gender, DOB, Mobile, Email, Address) values(?,?,?,?,?,?,?,?)";
		
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$stmt->bind_result($username);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
	
		if($rnum==0){
			$stmt->close();
			
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("ssssssss", $name, $username, $password, $gender, $dob, $mobile, $email, $address);
			$stmt->execute();
			echo "New record inserted SUCCESSFULLY :)";		
		}else{
			echo "Name or Username already registered";
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

?>
