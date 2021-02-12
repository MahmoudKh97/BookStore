<?php
include("connect.php");
$id = $_GET["ID"];
$query = "UPDATE `products` SET `STATUS`='deleted'  WHERE `ID`=$id";
$link->query($query);

$query = "DELETE FROM `wishlist` WHERE  `PRODUCT_ID`=$id";
$link->query($query);

$query = "DELETE FROM `cart` WHERE `PRODUCT_ID`=$id";
$link->query($query);

header("Location: ../delete_product.php");
?>