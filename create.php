<?php 
require "connection.php";

if(isset($_POST['submit'])){
    $fName = $_POST['first_name'];
    $lName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $user_role = $_POST['user_role'];

    $sql = "INSERT INTO registration set first_name ='$fName' , lastname = '$lName', 
    email = '$email', user_password ='$password', gender ='$gender', user_role = '$user_role'";

    $result = mysqli_query($connection,$sql) or 
    trigger_error("Failed SQL :". mysqli_error($connection), E_USER_ERROR);
    echo "<script> alert('Successfully Created')</script>";
    echo "<script> window.location.href = 'register.php'</script>";

}else{
    echo "<script> window.location.href = 'register.php'</script>";

}
?>