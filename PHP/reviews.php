<?php
	include("connect.php");
	
switch($_POST["action"] ){	

case "add":{
	$order_id = $_POST["ORDER_ID"];
	$product_id = $_POST["PRODUCT_ID"];
	$user_id = $_POST["USER_ID"];
	$rating = $_POST["RATING"];
	if(isset( $_POST["REVIEW"] )){
		$review = $_POST["REVIEW"];
	}else{
		$review = '';
	}
	$time = date("Y-m-d",time());
	
	$query = "SELECT * FROM `user_information` WHERE `ID`=$user_id";
	$result = $link->query($query);
	$array = $result->fetch_array();
	$username = $array["NAME"];
	
		$query = "INSERT INTO `reviews` (`ORDER_ID`,`PRODUCT_ID`,`USER_ID`,`USERNAME`,`RATING`,`REVIEW`,`TIME`)
				VALUES ('$order_id', '$product_id', '$user_id', '$username', '$rating', '$review', '$time')";
		$link->query($query);
		
	if(mysqli_affected_rows($link) >0){
		echo"<script>
			alert('Thank you. Your feedback has been added successfully');
			location.href = '../user-account.php';
			</script>";
	}else{
		echo"<script>
			alert('Oops! Something went wrong.');
			location.href = '../user-account.php';
			</script>";	
	}
break;
}




case "edit":{
	$order_id = $_POST["ORDER_ID"];
	$product_id = $_POST["PRODUCT_ID"];
	$user_id = $_POST["USER_ID"];
	$rating = $_POST["RATING"];
	if(isset( $_POST["REVIEW"] )){
		$review = $_POST["REVIEW"];
	}else{
		$review = '';
	}
	$time = date("Y-m-d",time());
	
	$query = "SELECT * FROM `user_information` WHERE `ID`=$user_id";
	$result = $link->query($query);
	$array = $result->fetch_array();
	$username = $array["NAME"];
	
		$query = "UPDATE `reviews` SET `USERNAME`='$username',`RATING`='$rating',`REVIEW`='$review',`TIME`='$time'
				 WHERE `ORDER_ID`='$order_id' AND `PRODUCT_ID`='$product_id' AND `USER_ID`='$user_id'";
		$link->query($query);
		
	if(mysqli_affected_rows($link) >0){
		echo"<script>
			alert('Thank you. Your feedback has been edited successfully');
			location.href = '../user-account.php';
			</script>";
	}else{
		echo"<script>
			alert('Oops! Something went wrong.');
			location.href = '../user-account.php';
			</script>";	
	}
break;
}



}	
?>