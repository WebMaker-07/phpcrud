<?php 
require "read.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Fruits Store</title>

</head>
<body>
    <div class="container mt-5 p-3 row">
       <div class="col-4">
        <h2>Adding </h2>
            <form action="create.php" method="post">
                <div>
                    <label class="form-label" for="">Fruit Name</label>
                    <input class="form-control" type="text" name="fruit_name">
                </div>
            <div>
                    <label class="form-label" for="">Quantity</label>
                    <input class="form-control"  type="number" name="quantity">
            </div>
            <div>
                    <label class="form-label" for="">Unit</label>
                    <select class="form-control" name="unit_id" >
                    <option value="">--Select Unit--</option>
                    <?php
                    $sql2 = "SELECT * FROM unit";
                    $unitresult = mysqli_query($connect, $sql2) or 
                    trigger_error("Error: ". mysqli_error($connection), E_USER_ERROR);
                    while( $rowunit = mysqli_fetch_array($unitresult)){
                        ?>
                   
                      
                        <option value="<?php echo $rowunit['unit_id']?>"><?php echo $rowunit['unit_name']?></option>
                     
                   
                   <?php } ?>
                   </select>
                </div>
                <button class="btn btn-primary mt-3" name="add" type="submit">Add</button>
            </form>
       </div >
        <div class="col">
            <table class="table table-dark ">
                <thead>
                    <th>Fruit Name</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </thead>
                <tbody>
                  <?php  while( $row = mysqli_fetch_array($result)){?>
                    <tr>
                        <td><?php  echo $row['fruit_name']?></td>
                        <td><?php  echo $row['quantity'] . $row['unit_name']?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['fruit_id'] ?>" class="btn btn-sm btn-success">Update</a>
                            <a href="delete.php?id=<?php echo $row['fruit_id'] ?>"class="btn btn-sm btn-danger">Delete</a>

                        </td>

                    </tr>
                   <?php }?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>