<?php
session_start();
include("connect.php");
include("security.php");

		$email = $_POST["EMAIL"];
		$name = $_POST["NAME"];
		$password = $_POST["PASSWORD"];
		$phone_number = $_POST["PHONE_NUMBER"];
		$country = $_POST["COUNTRY"];
		$city = $_POST["CITY"];
		$address = $_POST["ADDRESS"];
		$zip_code = $_POST["ZIP_CODE"];
		$status = 'pending';
		
		$query = "INSERT INTO `company` 
		(`EMAIL`, `PASSWORD`, `NAME`, `PHONE_NUMBER`, `COUNTRY`, `CITY`, `ADDRESS`, `ZIP_CODE`, `STATUS`) 
		VALUES (?,?,?,?,?,?,?,?,?);";
		$stmt = $link->prepare($query);
		$stmt->bind_param("sssssssss",$email,$password,$name,$phone_number,$country,$city,$address,$zip_code,$status);
		$stmt->execute();
		

			echo "<script>
			alert('Welcome to Book Store! Your account will be activated after 24 hours.');
			location.href = '../home.php';
			</script>";
		



?>