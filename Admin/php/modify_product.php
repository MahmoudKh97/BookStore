<?php
include("connect.php");
$id = $_GET["ID"];
$product_name = $_POST["NAME"];
 // Escapes special characters 
	$product_name = mysqli_real_escape_string($link, $product_name);
$price = $_POST["PRICE"];
$old_price = $_POST["OLD_PRICE"];
$description = $_POST["DESCRIPTION"];
$status = $_POST["STATUS"];
if($status == 'inactive'){
	$query = "DELETE FROM `wishlist` WHERE  `PRODUCT_ID`=$id";
	$link->query($query);
	$query = "DELETE FROM `cart` WHERE `PRODUCT_ID`=$id";
	$link->query($query);
}
$query = "UPDATE `products` 
	SET `NAME`='$product_name',`PRICE`='$price',`OLD_PRICE`='$old_price',`DESCRIPTION`='$description',`STATUS`='$status'
	WHERE `ID`=$id";
		$link->query($query);

if(!file_exists($_FILES['FILE']['tmp_name'][0]) || !is_uploaded_file($_FILES['FILE']['tmp_name'][0])) {
		header("Location:../modify_product.php");
}else{
foreach($_FILES["FILE"]["name"] as $i=> $name){
	
	$target_dir = "../../images/products/";
	http_response_code(201);
	$target_file = $target_dir . basename($_FILES["FILE"]["name"][$i]);
	$extension =pathinfo($target_file,PATHINFO_EXTENSION);
	$file_name = $target_dir.time().uniqid(rand()).".".$extension;
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["FILE"]["tmp_name"][$i]);
		if($check !== false) {
			echo '<script type="text/javascript">alert("File is an image - " . $check["mime"] . ".");</script>';
			$uploadOk = 1;
		} else {
			echo '<script type="text/javascript">alert("File is not an image.");</script>';
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo '<script type="text/javascript">alert("Sorry, file already exists.");</script>';
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["FILE"]["size"][$i] > 5000000) {
		echo '<script type="text/javascript">alert("Sorry, your file is too large.");</script>';
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
		echo '<script type="text/javascript">alert("Sorry, only JPG, JPEG, PNG  files are allowed.");</script>';
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo '<script type="text/javascript">alert("Sorry, your file was not uploaded.");</script>';
		header("Location:../modify_product.php");
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["FILE"]["tmp_name"][$i], $file_name)) {
			$file_name = preg_replace("/..\//","", $file_name, 1);
			
			
			$query = "INSERT INTO `products_images`(`PRODUCT_ID`, `IMAGE`)
			VALUES (
			$id ,
			'$file_name')";
			$link->query($query);
			http_response_code(200);
			header("Location:../modify_product.php");

		} 
	}
}
}
?>