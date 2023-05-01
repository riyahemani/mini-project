<?php

session_start();
$_SESSION = array();
session_destroy();
header("location: ngo_login.php");

?>
