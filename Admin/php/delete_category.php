<?php
include("connect.php");
$id = $_GET["id"];
$query = "DELETE FROM `category` WHERE `ID`=$id";
$link->query($query);
$query = "DELETE FROM `sub_category` WHERE `CATEGORY`=$id";
$link->query($query);

header("Location: ../category.php");
?>