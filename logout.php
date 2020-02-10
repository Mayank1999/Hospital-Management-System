<?php
	include "patlogin.php";
	include "doclogin.php";
	session_start();
	unset ($_SESSION["username"]);
	session_destroy();
	echo "<script>window.open('index.html','_self');</script>";
?>
