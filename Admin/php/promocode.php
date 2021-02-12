<?php
include("connect.php");

switch($_POST["action"] ){	

case "add":{
	$promocode = $_POST["PROMOCODE"];
	$percentage = $_POST["PERCENTAGE"];
	$text = $_POST["TEXT"];
	$status = $_POST["STATUS"];
	
	$query = "INSERT INTO `promocode`
	(`PROMOCODE`,`PERCENTAGE`,`TEXT`,`STATUS`) VALUES 
	('$promocode','$percentage','$text','$status')";
	$link->query($query);

	echo"<script>
			alert('Promo Code has been added successfully');
			location.href = '../promocode.php';
		</script>";
	break;
}

case "edit":{
	$promocode = $_POST["PROMOCODE"];
	$percentage = $_POST["PERCENTAGE"];
	$text = $_POST["TEXT"];
	$status = $_POST["STATUS"];

	$query = "UPDATE `promocode` SET
	`PROMOCODE`='$promocode',
	`PERCENTAGE`='$percentage',
	`TEXT`='$text',
	`STATUS`='$status' ";
	$link->query($query);

	echo"<script>
			alert('Promo Code has been edited successfully');
			location.href = '../promocode.php';
		</script>";
	break;
}


}
?>