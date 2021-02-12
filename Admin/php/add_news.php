<?php
include("connect.php");

	$news = $_POST["NEWS"];
	 // Escapes special characters 
	$news = mysqli_real_escape_string($link, $news);
	$query = "INSERT INTO `news`
	(`NEWS`) VALUES 
	('$news')";
	$link->query($query);
	header("Location:../news.php");



?>