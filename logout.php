<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>log out</title>
	<?php include "header.php"
	
	?>
</head>
	<?php
	
		session_start(); 
		session_destroy(); 
		header("location:login.php"); 
	?>

<body>
</body>
</html>