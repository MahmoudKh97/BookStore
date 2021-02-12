<?php
session_start();
UNSET($_SESSION["ADMIN"]);
session_destroy();
header("Location: ../index.php");
?>