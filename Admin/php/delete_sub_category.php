<?php
include("connect.php");
$id = $_GET["id"];
$query = "DELETE FROM `sub_category` WHERE `ID`=$id";
$link->query($query);

header("Location: ../sub_category.php");
?>