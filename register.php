<?php 
require 'session.php';
require 'retrieve.php';

if ($_SESSION['user_role'] == 'admin'){
    $welcome = "Welcome " . $_SESSION['email'] ." <br>User Type: " .$_SESSION['user_role'];
    $isAdmin = true;
}
else{
    $welcome = "Welcome " . $_SESSION['email']. " <br> User Type: " .$_SESSION['user_role'];
    $isAdmin = false;

}
class Employee{
    var $salary;
    var $position;

    function setSalary($posSalary){
        $this->salary = $posSalary;
    }
    function getSalary(){
       echo $this->salary ."<br>";
    }
    function setPostion($pos){
        $this->position =$pos;
    }
    function getposition(){
        echo $this->position ."<br>";
    }
   
}
$frontend = new Employee();
$frontend->setPostion("Front End Developer");
$frontend->setSalary("30,000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <form action="logout.php" method="post">
            <input type="submit" value="logout" class="btn btn-danger" >
        </form>
        <h2> <?php echo $welcome ?></h2>
        <h1>Registration Form</h1>
        <h3>Create User</h3>
        <form action="create.php" method="post">
            <input type="text"  name="first_name" id="first_name" placeholder="Enter First Name">
            <input type="text"  name="last_name" id="last_name" placeholder="Enter Last Name">
            <input type="text"  name="email" id="email" placeholder="Enter your email">
            <input type="text"  name="password" id="password" placeholder="Enter your password">
            <select name="gender" id="gender">
                <option value="" selected>-- Please Select Gender --</option>
                <option value="male"> Male</option>
                <option value="female"> Female</option>
            </select>
            <select name="user_role" id="user_role">
                <option value="" selected>-- Please Select User Role --</option>
                <option value="user"> User</option>
                <option value="admin"> Admin</option>
            </select>
            <button type="submit" name="submit" class="btn btn-primary btn-sm" >Create</button>
        </form>
    </div>
    <table class="table m-3 table-dark container">
        <thead >
            <th> <a href="?column=registration_id&sort=<?php echo $sort ?>">ID</a></th>
            <th><a href="?column=first_name&sort=<?php echo $sort ?>">First Name </a></th>
            <th><a href="?column=lastname&sort=<?php echo $sort ?>">Last Name</a></th>
            <th><a href="?column=gender&sort=<?php echo $sort ?>">Gender</a></th>
            <th><a href="?column=user_role&sort=<?php echo $sort ?>">User Role</a></th>
            <?php if($isAdmin){?>
            <th>Action</th><?php };?>
        </thead>
        <tbody>
           <?php 
               while( $row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td> <?php  echo $row['registration_id']?></td>
                    <td> 
                        <?php echo $row['first_name']. "<br>";
                        $frontend->getposition() . $frontend->getSalary();?></td>
                    <td> <?php  echo $row['lastname']?></td>
                    <td> <?php  echo $row['gender']?></td>
                    <td> <?php  echo $row['user_role']?></td>
                    <?php if($isAdmin){?>
                    <td class="d-flex gap-2">
                        <form action="update.php" method="post">
                           <input type="hidden" name="email"  value="<?php echo $row['email'] ?>">
                            <input type="submit" class="btn btn-success" name="update" id="update" value="update"> 
                        </form>
                        <form action="delete.php" method="post">
                           <input type="hidden" name="email"  value="<?php echo $row['email'] ?>">
                            <input type="submit" name="delete" class="btn btn-danger"id="delete" value="delete"> 
                        </form>
                    </td>
                    <?php }; ?>
                    

                </tr>
                <?php
               }
           ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>