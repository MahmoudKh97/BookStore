<?php
session_start();
include("connect.php");
include("security.php");

switch($_GET["action"] ){	

	case "login":{
		$email = $_POST["EMAIL"];
		$password = $_POST["PASSWORD"];

		$query = "SELECT * FROM `user_information` WHERE `EMAIL`=? AND `PASSWORD`=?";
		$stmt = $link->prepare($query);
		$stmt->bind_param("ss",$email,$password);
		$stmt->execute() ; 
		$result = $stmt->get_result();

		if($result->num_rows == 1){
			$array = $result->fetch_assoc();
			$id = $array["ID"];
			$_SESSION["USER"] = $id;
			header("Location: ../user-account.php");
		}else{
			echo "<script>
			alert('Invalid Login!');
			location.href = '../user-login.php';
			</script>";
		}

		break;
	}
	
	case "signup":{
		$email = $_POST["EMAIL"];
		$name = $_POST["NAME"];
		$password = $_POST["PASSWORD"];
		$phone_number = $_POST["PHONE_NUMBER"];
		$gender = $_POST["GENDER"];
		$country = $_POST["COUNTRY"];
		$city = $_POST["CITY"];
		$address = $_POST["ADDRESS"];
		$zip_code = $_POST["ZIP_CODE"];
		
		$query = "INSERT INTO `user_information` 
		(`EMAIL`, `PASSWORD`, `NAME`, `PHONE_NUMBER`, `GENDER`, `COUNTRY`, `CITY`, `ADDRESS`, `ZIP_CODE`) 
		VALUES (?,?,?,?,?,?,?,?,?);";
		$stmt = $link->prepare($query);
		$stmt->bind_param("sssssssss",$email,$password,$name,$phone_number,$gender,$country,$city,$address,$zip_code);
		$stmt->execute();
		
		
		$query = "SELECT * FROM `user_information` WHERE `EMAIL`=? AND `PASSWORD`=?";
		$stmt = $link->prepare($query);
		$stmt->bind_param("ss",$email,$password);
		$stmt->execute() ; 
		$result = $stmt->get_result();

		if($result->num_rows == 1){
			$array = $result->fetch_assoc();
			$id = $array["ID"];
			$_SESSION["USER"] = $id;
			header("Location: ../user-account.php");
		}else{
			echo "<script>
			alert('Signup failed!');
			location.href = '../user-login.php';
			</script>";
		}

		break;
	}
	
	
	
}

?>