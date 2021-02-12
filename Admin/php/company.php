<?php
include("connect.php");

switch($_GET["action"] ){	

case "accepted":{
	$company_id = $_GET["company_id"];
	$status = 'accepted';

	$query = "UPDATE `company` SET `STATUS`='$status' WHERE `ID`=$company_id ";
	mysqli_query($link,$query);
	echo mysqli_error($link);

	echo"<script>
			location.href = '../company.php';
		</script>";
	break;
}

case "rejected":{
	$company_id = $_GET["company_id"];

	$query = "Delete FROM `company` WHERE `ID`=$company_id";
	mysqli_query($link,$query);
	echo mysqli_error($link);

	echo"<script>
			location.href = '../company.php';
		</script>";
	break;
}


case "delete":{
	$company_id = $_GET["company_id"];
	
	$query = "UPDATE `company` SET `STATUS`='deleted' WHERE `ID`=$company_id";
	$link->query($query);
	$query = "SELECT * FROM `products` WHERE `COMPANY`=$company_id ";
	$result = $link->query($query);
	while($array = $result->fetch_array()){
		$product_id = $array["ID"];
		$query1 = "UPDATE `products` SET `STATUS`='deleted' WHERE `ID`=$product_id";
		$link->query($query1);
	}
	echo"<script>
			location.href = '../company.php';
		</script>";
		
	break;
}


}
?>