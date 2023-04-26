<?php 
include "connection.php";
include "session.php";
$email = trim($_POST['email']);
$password = trim($_POST['password']);
if(empty($email) OR empty($password)){
    header('Location: index.php');
}
else{
    $sql = "SELECT * FROM registration WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);

    $row = mysqli_fetch_array($result);

    var_dump($row);

    $count = mysqli_num_rows($result);
    $_SESSION['email'] = $email;
    $_SESSION['user_role'] = $row['user_role'];
    $_SESSION['status'] = "valid";

    echo $count;
    header('Location: register.php');
}

?>