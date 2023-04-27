<?php
require 'dbconnection.php';

if(isset($_POST['add'])){
    $fruitName = $_POST['fruit_name'];
    $quantity = $_POST['quantity'];
    $unit_id = $_POST['unit_id'];

    $sql ="INSERT INTO fruits set fruit_name = '$fruitName', 
    quantity ='$quantity',unit_id = '$unit_id' ";

    $result = mysqli_query($connect, $sql) or
     trigger_error("Error: ". mysqli_error($connect, E_USER_ERROR));

    echo "<script> alert('Successfully Created')</script>";
    echo "<script> window.location.href = 'index.php'</script>";

}
else{
    echo "<script> window.location.href = 'index.php'</script>";

}

?>