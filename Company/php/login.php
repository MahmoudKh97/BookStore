<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("connect.php");
include("security.php");
$email = $_POST["EMAIL"];
$password = $_POST["PASSWORD"];

$query = "SELECT * FROM `company` WHERE `EMAIL`=? AND `PASSWORD`=? AND `STATUS`!='deleted'";
$stmt = $link->prepare($query);
$stmt->bind_param("ss",$email,$password);


 $stmt->execute() ; 

$result = $stmt->get_result();

		if($result->num_rows == 1){
			$array = $result->fetch_assoc();
			if($array["STATUS"] == 'accepted'){
				$_SESSION["COMPANY"] = $array["ID"];
				header("Location: ../dashboard.php");
			}else{
				echo "<script>
					alert('Your request is pending admin approval! ');
					location.href = '../index.php';
					</script>";
			}
		}else{
			echo "<script>
			alert('Invalid Login!');
			location.href = '../index.php';
			</script>";
		}
?>