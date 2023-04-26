<?php 
    require "connection.php";
    // echo "Result: " . $_POST['email'];
    if(isset($_POST['delete'])){
        $email = $_POST['email'];
        $sql = "SELECT * FROM registration WHERE email = '$email'";
        $result = mysqli_query($connection,$sql) or trigger_error("Failed SQL:" . mysqli_error($connection),E_USER_ERROR);
        $row = mysqli_fetch_array($result);
    }
    // var_dump( $row);
    if(isset($_POST['deleteBtn'])){
      
        $email = $_POST['email']; 
        $sql = "DELETE  FROM registration  WHERE email = '$email'";
        $result = mysqli_query($connection,$sql) or trigger_error("Failed SQL:" . mysqli_error($connection),E_USER_ERROR);
        echo "<script>
        alert('Deleted Successfully ');
        window.location.href = 'register.php';
        </script>";


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <input type="text" readonly value ="<?php echo $row['first_name']?>" name="first_name" id="first_name" placeholder="Enter First Name">
        <input type="text" readonly value ="<?php echo $row['lastname']?>"  name="last_name" id="last_name" placeholder="Enter Last Name">
        <input type="text" readonly value ="<?php  echo$row['email']?>"  name="email" id="email" placeholder="Enter your email">
       
        <select name="gender" id="gender" readonly>
            <option value="" selected>-- Please Select Gender --</option>
            <option value="male" <?php echo $row['gender'] === 'male'? 'selected' : ""?> > Male</option>
            <option value="female" <?php echo $row['gender'] === 'female'? 'selected' : ""?>> Female</option>
        </select>
        <select name="user_role" id="user_role" readonly>
            <option value="" selected>-- Please Select User Role --</option>
            <option value="user" <?php echo $row['user_role'] === 'user'? 'selected' : ""?>> User</option>
            <option value="admin" <?php echo $row['user_role'] === 'admin'? 'selected' : ""?>> Admin</option>
        </select>
        <button type="submit" name="deleteBtn"  >Delete</button>
    </form>
   
</body>
</html>