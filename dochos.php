<html>
	<head>
	<style>

	*{
		margin: 0;
		padding: 0;
		font-family: Century Gothic;
	}

	body{
		background-image: url(12.jpg);
		height: 100vh;
		background-size: cover;
		background-position: center;
	}
		.reg{
		padding: 15px 25px; font-size: 24px; text-align: center; cursor: pointer; outline: none; color: #fff; background-color: #00802b; border:none; border-radius: 15px; box-shadow: 0 9px #999; font-size:20pt;}
	.reg:hover{
		background:color: #3e8e41;}
	.reg:active{
		background:color: #3e8e41;
		box-shadow: 0 5px #666;
		transform: translateY(4px);
	}
	.sub1{
		margin:20px; padding: 15px 25px; font-size: 24px; text-align: center; cursor: pointer; outline: none; color: #fff; background-color: #cc0000; border:none; border-radius: 15px; box-shadow: 0 9px #999; font-size:20pt;}
	.sub1:hover{
		background:color: #3e8e41;}
	.sub1:active{
		background:color: #3e8e41;
		box-shadow: 0 5px #666;
		transform: translateY(4px);
	}
	</style>
	<b><p align="center" style="font-size:50pt;">WELCOME RESPECTED ADMIN</p></b><br><br>
		<title>Doctor-Hospital Registration</title>
		<div align="right" style="font-size:45pt;" style="color:#0000ff;">
			<a href="logout.php">Logout</a>
		</div>
		<form action="insertdochos.php" method="POST">
			<fieldset style="font-size:40pt;">
				<legend  align="center">DOCTOR-HOSPITAL REGISTRATION</legend>
				<label>NAME: Dr. <input type="text" name="name" placeholder="Enter Doctor's Name" size="25" style="font-size:30pt; opacity:0.7;" required></label><br><br>
				<label>DOC-ID*: <input type="text" name="docid" placeholder="Create DOC-ID" style="font-size:30pt; opacity:0.7;" required></label><br><br>
				<input class="reg" type="submit" name="reg" value="Register"><input class="sub1" type="reset" value="Reset">			
			</fieldset>
			</form>	
	</head>
</html>
