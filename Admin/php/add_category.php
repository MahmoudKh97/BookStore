<?php
include("connect.php");
$category = $_POST["CATEGORY"];
	
$target_dir = "../../images/category/";
http_response_code(201);
$target_file = $target_dir . basename($_FILES["FILE"]["name"]);
$extension =pathinfo($target_file,PATHINFO_EXTENSION);
$file_name = $target_dir.time().".".$extension;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["FILE"]["tmp_name"]);
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
if ($_FILES["FILE"]["size"] > 5000000) {
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
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["FILE"]["tmp_name"], $file_name)) {

		$file_name = preg_replace("/..\//","", $file_name, 1);
		include("connect.php");
		$query = "INSERT INTO `category` (`CATEGORY`, `IMAGE`)
		VALUES 
		('$category', '$file_name')";
		$link->query($query);
		http_response_code(200);
		header("Location:../category.php");

    } else {
		echo '<script type="text/javascript">alert("Sorry, there was an error uploading your file.");
		window.location.href="../category.php";
		</script>';

    }
}

?>