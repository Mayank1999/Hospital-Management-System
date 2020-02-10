<?php include "doclogin.php";
	if(!isset($_SESSION['username']))
	{
		echo "Login First";
		header ('location: doc.php');
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Doctors</title>
		<link rel="stylesheet" type ="text/css" href="css/weldocstyle.css">
	</head>
	<body>
		<header>
		<div align="center" style="font-size:45pt;"><b><p style="color:red; font-size:80pt;"><?php
			$db = mysqli_connect('localhost', 'root', '', 'hospital management system');
			$uname = $_SESSION['username'];
			$query = "SELECT * FROM doctors WHERE Username = '$uname'";
			$res = mysqli_query($db,$query);
			$ro = $res->fetch_assoc();
			echo "Welcome Dr. ";
			echo $ro['name']; ?></p></b></div><br><br><br>
		
		<div align="right" style="font-size:45pt;" style="color:#0000ff;">
			<a href="logout.php">Logout</a>
		</div>
		<div class="main">
			<ul>
				<li><a href="report.php">Manage Patient Reports</a></li>
			</ul>
		</div><br><br><br><br><br><br><br><br><br><marquee style="font-size:65pt; color: #336600;" scrollamount="17" direction = "left"><b>ALWAYS REMEMBER A LIFE SAVED IS A FAMILY SAVED</b></marquee>
		</header>	
	</body>
</html>

