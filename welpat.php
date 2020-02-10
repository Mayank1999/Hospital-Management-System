<?php include "patlogin.php";
	if(!isset($_SESSION['username']))
	{
		echo "Login First";
		header ('location: pat.php');
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Patients</title>
		<link rel="stylesheet" type ="text/css" href="css/welpatstyle.css">
	</head>
	<body>
		<header>
		<div align="center" style="font-size:45pt;"><b><p style="color:red; font-size:65pt;">
		<?php
			$db = mysqli_connect('localhost', 'root', '', 'hospital management system');
			$uname = $_SESSION['username'];
			$query = "SELECT * FROM patients WHERE Username = '$uname'";
			$res = mysqli_query($db,$query);
			$ro = $res->fetch_assoc();
			echo "Welcome Patient ";
			echo $ro['Name']; 
		?>
		</p></b></div><br><br><br>		
		<div class="main">
			<ul>
				<li><a href="view_report.php">Reports</a></li>				
				<li><a href="feedback.html">Feedback</a></li>
			</ul>
		</div>
		<div align="right" style="font-size:45pt;" style="color:#0000ff;">
			<a href="logout.php">Logout</a>
		</div><br><br><br><br><br><br><br><br><br>
		<marquee style="font-size:45pt; color: #336600;" scrollamount="17" direction = "left"><b>NIRMA HOSPITAL WELCOMES YOU</b></marquee>
		</header>	
	</body>
</html>


