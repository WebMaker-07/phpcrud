<?php
require 'dbconnection.php';

$sql = "SELECT * FROM fruits  LEFT JOIN unit 
 ON  unit.unit_id = fruits.unit_id";

$result = mysqli_query($connect, $sql) or 
trigger_error("Error: ". mysqli_error($connection), E_USER_ERROR);
?>