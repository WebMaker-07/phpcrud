<?php 
$host = "localhost";
$username ="root";
$password ="";
$database= "fruitsdb";
$port ="3307";

$connect = mysqli_connect($host,$username,$password,$database,$port);

if(mysqli_connect_error()){
    echo "Unable to Connect to the database";
}
else{
    echo "Successfully Database";
}

?>