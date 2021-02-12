<?php
include("connect.php");

switch($_GET["action"] ){	

case "shipped":{
	$order_id = $_GET["order_id"];
	$product_id = $_GET["product_id"];
	$status = 'shipped';

	$query = "UPDATE `orders` SET `STATUS`='$status' WHERE `ORDER_ID`=$order_id AND `PRODUCT_ID`=$product_id";
	mysqli_query($link,$query);
	echo mysqli_error($link);

	echo"<script>
			location.href = '../orders.php';
		</script>";
	break;
}

case "rejected":{
	$order_id = $_GET["order_id"];
	$product_id = $_GET["product_id"];
	$status = 'rejected';

	$query = "UPDATE `orders` SET `STATUS`='$status' WHERE `ORDER_ID`=$order_id AND `PRODUCT_ID`=$product_id";
	mysqli_query($link,$query);
	echo mysqli_error($link);

	echo"<script>
			location.href = '../orders.php';
		</script>";
	break;
}


}
?>