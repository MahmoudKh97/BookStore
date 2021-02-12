<?php
include("connect.php");
$id = $_GET["id"];
$query = "DELETE FROM `newsletter` WHERE `ID`=$id";
$link->query($query);


header("Location: ../newsletter.php");
?>