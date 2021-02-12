<?php
	include("connect.php");

	$email = $_POST["NEWSLETTER"];
	$ref = $_GET["REF"];


	$query = "INSERT INTO `newsletter` (`EMAIL`)
				VALUES ('$email')";
	mysqli_query($link,$query);
	echo mysqli_error($link);
	echo"<script>
			alert('Successfully Subscribed. Thank you for subscribing to BookStore newsletter. ');
			location.href = '../$ref';

		</script>";
?>