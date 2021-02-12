<?php
include("connect.php");

switch($_GET["action"] ){	

case "add":{
	$user_id = $_GET["USER_ID"];
	$percentage = $_GET["PERCENTAGE"];
	$time = date('Y-d-m H:i',time());
	$status = "pending";
	
	$query = "SELECT MAX(ORDER_ID) AS ORDER_ID FROM `orders`";
	$result = $link->query($query);
	$array = $result->fetch_array();
	$order_id = $array["ORDER_ID"] + 1;

	$query = "SELECT * FROM `cart` WHERE `USER_ID`=$user_id";
	$result = $link->query($query);
	while($array = $result->fetch_array()){
	$product_id = $array["PRODUCT_ID"];
	$quantity = $array["QUANTITY"];
		$query1 = "SELECT * FROM `products` WHERE `ID`=$product_id";
		$result1 = $link->query($query1);
		$array1 = $result1->fetch_array();
		$price = $array1["PRICE"];
	$sub_total = (float)$price * $quantity;
	$discount = $sub_total * $percentage / 100;
	$discount = number_format((float)$discount, 2, '.', '');
	$amount = $sub_total - $discount;
	$amount = number_format((float)$amount, 2, '.', '');
	$query1= "INSERT INTO `orders` (`ORDER_ID`,`USER_ID`,`PRODUCT_ID`,`QUANTITY`,`AMOUNT`, `DISCOUNT_PERCENTAGE`, `TIME`,`STATUS`)
			VALUES ($order_id, $user_id, $product_id, $quantity, '$amount', '$percentage', '$time', '$status')";
	mysqli_query($link,$query1);
	echo mysqli_error($link);
	$query2 = "DELETE FROM `cart` WHERE `USER_ID`=$user_id AND `PRODUCT_ID`=$product_id";
	$link->query($query2);
	}
	echo"<script>
			alert('Your order request has been sent. Please, check order status until received succefully. ');
			location.href = '../user-account.php';
		</script>";

	break;
}

case "canceled":{
	$order_id = $_GET["order_id"];
	$product_id = $_GET["product_id"];

	$query = "DELETE FROM `orders` WHERE `ORDER_ID`=$order_id AND `PRODUCT_ID`=$product_id";
	$link->query($query);

	echo"<script>
			alert('We are sorry to know that you want to cancel the order! It will be deleted permanently. ');
			location.href = '../user-account.php';
		</script>";
	break;
}

case "delivered":{
	$order_id = $_GET["order_id"];
	$product_id = $_GET["product_id"];
	$status = "delivered";

	$query = "UPDATE `orders` SET `STATUS`='$status' WHERE `ORDER_ID`=$order_id AND `PRODUCT_ID`=$product_id";
	mysqli_query($link,$query);
	echo mysqli_error($link);

	echo"<script>
			alert('YAY! We are happy to know that you received the product. Please doo not forget to take a minute to review it thoroughly! ');
			location.href = '../user-account.php';
		</script>";
	break;
}


}
?>