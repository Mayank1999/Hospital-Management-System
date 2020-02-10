<?php include('patlogin.php') ?>

<html>
	<head>
		<title>NIRMA HOSPITAL</title>
		<link rel="stylesheet" type ="text/css" href="css/patstyle.css">
	<style>
	.sub{
		padding: 15px 25px; font-size: 24px; text-align: center; cursor: pointer; outline: none; color: #fff; background-color: #000041; border:none; border-radius: 15px; box-shadow: 0 9px #999; font-size:35pt;}
	.sub:hover{
		background:color: #3e8e41;}
	.sub:active{
		background:color: #3e8e41;
		box-shadow: 0 5px #666;
		transform: translateY(4px);
	}
	.sub1{
		margin:50px; padding: 15px 25px; font-size: 24px; text-align: center; cursor: pointer; outline: none; color: #fff; background-color: #cc0000; border:none; border-radius: 15px; box-shadow: 0 9px #999; font-size:35pt;}
	.sub1:hover{
		background:color: #3e8e41;}
	.sub1:active{
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
		<b><p style="font-size:60pt;" align="center">HELLO PATIENTS!</p></b><br><br>
		<div align="right"><button class="button b" onclick="goBack()"><b><h1>BACK</h1></b></button></div>
		<marquee style="font-size:40pt; color: #004d00;" scrollamount="17" direction = "left"><b>WE ARE THERE TO HEAR YOU</b></marquee><br><br><br><br><br>
		<div align="center" style="font-size:35pt;">
		<form action="patlogin.php" method="POST">
		USERNAME: <input type="text" name="username" placeholder="Enter your Username" style="font-size:35pt; opacity:0.7;" required/><br><br>
		PASSWORD: <input type="password" name="password" placeholder="Enter your Password" style="font-size:35pt; opacity:0.7;" required/><br><br>
		<input class="sub" type="submit" name="sub" value="Login"/></form><form action="patreg.php"><input class="sub1" type="submit" value="Register"/></form>
		</div><br>
	</head>
</html>

