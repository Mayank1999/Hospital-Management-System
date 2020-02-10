<?php include "patlogin.php";
	if(!isset($_SESSION['username']))
	{
		echo "GET LOST";
	}
?>
<html>
<head>
<style>
body{
	background-color:#ffff99;
}
	.sub{
		padding: 15px 25px; font-size: 24px; text-align: center; cursor: pointer; outline: none; color: #fff; background-color: #6fff00; border:none; border-radius: 15px; box-shadow: 0 9px #999; font-size:30pt;}
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
</head>
<title>Electronic Health Report</title>
<body>
	<div align="right"><button class="button b" onclick="goBack()"><b><h1>BACK</h1></b></button></div>
<form name="Electronic Health Report" method="post">
<!--<fieldset>
<legend align="center">Electronic Health Report</legend>-->
<?php 
	if(isset($_SESSION['username']))
	{
		$uname=$_SESSION['username'];
		$doc="";
?>	
<?php 
		$query = "SELECT * FROM patreport WHERE Username='$uname'";
		$res = mysqli_query($db,$query);
		$n = mysqli_num_rows($res);
?><br>
	<form action="#" method="POST"><div align="center">
	<select name="sel" style="font-size:30pt;background-color:#ccccff;">
		<option>Choose Report</option>
	<?php
		for($i=0;$i<$n;$i++)
		{

			$row = mysqli_fetch_array($res);
			$doc = $row['docname'];
	?>
	<option value="<?php echo $doc ?>"><?php echo $doc?></option>
	<?php
		}

	}
?>
</select><br><br><br><br>
	<button type="submit" name="view" class="sub">Submit</button></div>
</form>
<?php
	if(isset($_POST['view']))
	{
		$docname=mysqli_real_escape_string($db,$_POST['sel']);
		$query = "SELECT * FROM patreport WHERE docname='$docname' AND Username='$uname'";
		$res = mysqli_query($db,$query);
		$ro = $res->fetch_assoc();
?><br><br><br>
<form name="Electronic Health Report" style="font-size:40pt;">
<fieldset>
<legend align="center">Electronic Health Report</legend>
Patient Id:<input type="text" name="pid" style="font-size:30pt;" value="<?php echo $ro['Username']?>" required disabled><br>
	Date Of Appointment:<input type="text" name="doa" style="font-size:30pt;" required value="<?php echo $ro['dateofapp']?>" disabled><br>
	Doctor Name:<input type="text" name="d_name" style="font-size:30pt;" required value="<?php echo $ro['docname']?>" disabled>  <br>
	Health Issue:<br><textarea rows="5" cols="40" style="font-size:30pt;" wrap="physical" required placeholder="<?php echo $ro['healthissue']?>" disabled>
</textarea><br>
Medication:<br><textarea rows="5" cols="40" style="font-size:30pt;" wrap="physical" required placeholder="<?php echo $ro['medication']?>" disabled>
</textarea><br>

</fieldset>
</form>
<?php
	}
?>
</body>
</html>
