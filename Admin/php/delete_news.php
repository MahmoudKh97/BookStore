<?php
include("connect.php");
$id = $_GET["id"];
$query = "DELETE FROM `news` WHERE `ID`=$id";
$link->query($query);


header("Location: ../news.php");
?>