<?php
require "dbconnection.php";
if(isset($_GET['id'])){
    $fruit_id = $_GET['id'];

$sql ="DELETE  FROM fruits  WHERE fruit_id = '$fruit_id'";

    $result = mysqli_query($connect, $sql) or
     trigger_error("Error: ". mysqli_error($connect, E_USER_ERROR));
 

    echo "<script> alert('Successfully Delete')</script>";
    echo "<script> window.location.href = 'index.php'</script>";

}

 ?>
