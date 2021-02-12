<?php
include("connect.php");

$name = $_POST["NAME"];
$email = $_POST["EMAIL"];
$subject = $_POST["SUBJECT"];
$phone_number = $_POST["PHONE_NUMBER"];
$message = $_POST["MESSAGE"];
$time = date('Y-d-m H:i',time());

$query = "INSERT INTO `contact` (`NAME`, `EMAIL`, `SUBJECT`, `PHONE_NUMBER`, `MESSAGE`, `TIME`)
 VALUES ('$name', '$email', '$subject', '$phone_number', '$message', '$time')";
mysqli_query($link,$query);
echo mysqli_error($link);
echo"<script>
			alert('Message Sent ');
			location.href = '../contact.php';
			</script>";
?>