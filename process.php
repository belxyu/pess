<?php 

$userId="admin";
$password="admin";

session_start();

if(isset($_SESSION['userId'])){
	echo "<h1>Welcome " .$_SESSION['userId']."</h1>";
	
	
}