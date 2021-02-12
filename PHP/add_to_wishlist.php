<?php
	include("connect.php");

	$product_id = $_POST["PRODUCT_ID"];
	$user_id = $_POST["USER_ID"];
	$quantity = $_POST["QUANTITY"];
	
	$query1 = "SELECT  COUNT(*) AS num_rows FROM `wishlist` WHERE `PRODUCT_ID`=$product_id AND `USER_ID`=$user_id LIMIT 1";
	$result1 = $link->query($query1);
	$array1 = $result1->fetch_array();
	if($array1["num_rows"] > 0){
		$response = "Item is Already in Your Wishlist !";		
	}else{
		$query = "INSERT INTO `wishlist` (`USER_ID`,`PRODUCT_ID`,`QUANTITY`)
				VALUES ($user_id, $product_id, $quantity)";
		mysqli_query($link,$query);
		echo mysqli_error($link);
		$response = "Item Added to Your Wishlist !";

	}

		
	echo json_encode(array('response' => $response));
	exit();
?>