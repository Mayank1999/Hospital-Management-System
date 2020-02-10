<?php
$name = $_POST['name'];
$docid = $_POST['docid'];

if(!empty($name) || !empty($docid))
{
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "hospital management system";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	
	if(mysqli_connect_error()){
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());	
	}else{
		$SELECT = "SELECT docid from dochospital Where docid = ? Limit 1";
		$INSERT = "INSERT Into dochospital (name, docid) values(?,?)";
		
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $docid);
		$stmt->execute();
		$stmt->bind_result($docid);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
	
		if($rnum==0){
			$stmt->close();
			
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("ss", $name, $docid);
			$stmt->execute();
			echo "New record inserted SUCCESSFULLY :)";		
		}else{
			echo "DOC-ID already registered";
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
