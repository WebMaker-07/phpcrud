<?php
require "dbconnection.php";
if(isset($_GET['id'])){
    $fruit_id = $_GET['id'];

$sql ="SELECT * FROM fruits  LEFT JOIN unit 
ON  unit.unit_id = fruits.unit_id WHERE fruit_id = '$fruit_id'";

    $result = mysqli_query($connect, $sql) or
     trigger_error("Error: ". mysqli_error($connect, E_USER_ERROR));

     $row = mysqli_fetch_array($result);
}

if(isset($_POST['update'])){
    $fruitName = $_POST['fruit_name'];
    $quantity = $_POST['quantity'];
    $unit_id = $_POST['unit_id'];
    $fruit_id = $_POST['fruit_id'];

    $sql = "UPDATE fruits  set fruit_name = '$fruitName', quantity = '$quantity',
    unit_id = '$unit_id'WHERE fruit_id = ' $fruit_id '";
    $result = mysqli_query($connect,$sql) or trigger_error("Failed SQL:" . mysqli_error($connect),E_USER_ERROR);
    echo "<script>
    alert('Product Successfully Updated');
    window.location.href = 'index.php';
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
    <div class="container">
    <div class="">
        <h2>Update </h2>
            <form action="" method="post">
            <input class="form-control" value="<?php echo $row['fruit_id']?>"type="text" name="fruit_id">
                <div>
                    <label class="form-label" for="">Fruit Name</label>
                    <input readonly class="form-control" value="<?php echo $row['fruit_name']?>" type="text" name="fruit_name">
                </div>
            <div>
                    <label class="form-label" for="">Quantity</label>
                    <input class="form-control"  type="number" name="quantity" value="<?php echo $row['quantity']?>">
            </div>
                <div>
                    <label class="form-label" for="">Quantity</label>
                    <select class="form-control" name="unit_id" >
                    <option value="">--Select Unit--</option>
                    <?php
                    $sql = "SELECT * FROM unit";
                    $result = mysqli_query($connect, $sql) or 
                    trigger_error("Error: ". mysqli_error($connection), E_USER_ERROR);
                    while( $unitrow = mysqli_fetch_array($result)){
                        ?>
                   
                      
                        <option value="<?php echo $row['unit_id']?>" <?php echo $unitrow['unit_id'] === $row['unit_id']? 'selected' : ""?>><?php echo $unitrow['unit_name']?></option>
                     
                   
                   <?php } ?>
                   </select>
                </div>
                <button class="btn btn-primary mt-3" name="update" type="submit">update</button>
            </form>
       </div >
    </div>
</body>
</html>