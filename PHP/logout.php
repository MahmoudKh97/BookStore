<?php
session_start();
UNSET($_SESSION["USER"]);
session_destroy();
header("Location: ../home.php");
?>