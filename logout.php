<?php
require "connection.php";
session_start();

$_SESSION['status'] = "invalid";
unset($_SESSION['email']);
unset($_SESSION['access']);
header('Location: index.php');
mysqli_close($connection);// Close the connection
session_destroy();
?>