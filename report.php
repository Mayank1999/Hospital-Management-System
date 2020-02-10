<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hospital management system";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
$query = "SELECT * FROM `patients` ";
$query1 = "SELECT * FROM `doctors` ";

$result = mysqli_query($conn, $query);
$result1 = mysqli_query($conn, $query1);

?>

<html>
	<head>
	<style>
body{
	background-color:#ffff99;
}
	.sub{
		padding: 15px 25px; font-size: 24px; text-align: center; cursor: pointer; outline: none; color: #fff; background-color: #cc3300; border:none; border-radius: 15px; box-shadow: 0 9px #999; font-size:30pt;}
	.sub:hover{
		background:color: #3e8e41;}
	.sub:active{
		background:color: #3e8e41;
		box-shadow: 0 5px #666;
		transform: translateY(4px);
	}
	.button {
	  background-color: #cc0000; /* Green */
	  border: none;
	  color: white;
	  padding: 16px 32px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;
	  margin: 4px 2px;
	  -webkit-transition-duration: 0.4s; /* Safari */
	  transition-duration: 0.4s;
	  cursor: pointer;
	}
	.b {
	  background-color: #a6a6a6; 
	  color: black; 
	  border: 2px solid #cc0000;
	}
	.b:hover {
	  background-color: #cc0000;
	  color: white;
	}
</style>
<script>
		function goBack()
		{
  			window.history.back();
		}
	</script>
		<title>Electronic Health Report</title>
		<div align="right"><button class="button b" onclick="goBack()"><b><h1>BACK</h1></b></button></div>
		<form action="insertreport.php" method="POST" style="font-size:35pt;">
		<fieldset>
		<legend align="center">Electronic Health Report</legend>
		Patient :<select name="username"  style="font-size:30pt;" required>
		<option value="">select</option>
		<?php while($row1 = mysqli_fetch_array($result)):;?><option value="<?php echo $row1[2];?>"><?php echo $row1[0]," | ",$row1[1]," | ",$row1[2];?></option><?php endwhile; ?>		
		</select>  <br>
		Doctor Name:<select name="docname" style="font-size:30pt;" required>
		<option value="">select</option>
		<?php while($row1 = mysqli_fetch_array($result1)):;?><option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option><?php endwhile; ?>		
		</select>  <br>
		Health Issue:<br><textarea style="font-size:30pt;" rows="5" cols="40" name="healthissue" wrap="physical" required>
		</textarea><br>
		Medication:<br><textarea style="font-size:30pt;" rows="5" cols="40" wrap="physical" name="medication" required>
		</textarea><br>		
		Date Of Appointment:<input style="font-size:30pt;" type="date" name="dateofapp"  required><br>
</fieldset>
		<button type="submit" class="sub" name="sub" value="Submit" style="width: 10%; 
  margin:auto; 
  padding: 15px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;">Submit</button</form>
</head>

</html>
