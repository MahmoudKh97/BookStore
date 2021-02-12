<?php
	include("connect.php");

	$product_id = $_GET["PRODUCT_ID"];
	$user_id = $_GET["USER_ID"];
	
	$query = "DELETE FROM `wishlist` WHERE `USER_ID`=$user_id AND `PRODUCT_ID`=$product_id";
	$link->query($query);

	header("Location: ../user-wishlist.php");
?>