<?php
include("connect.php");
$category_id = $_POST["CATEGORY_ID"];
$query = "SELECT * FROM `sub_category` WHERE `CATEGORY`=$category_id";
$result = $link->query($query);
echo '<option disabled select selected hidden >Select Sub Category</option>';
while($array = $result->fetch_array() ){
	$sub_category = $array["SUB_CATEGORY"];
	$sub_category_id = $array["ID"];
	echo "<option value='$sub_category_id' id ='SUB_CATEGORY'>$sub_category</option>";
}

?>