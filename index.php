
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
  
 
  <div class="container ms-auto mt-5 w-50 bg-dark text-white p-5 rounded-5">
  <h1 class="text-center">Login</h1>
  <form name="loginForm" action="authenticate.php" method="POST"  class="w-100 ">
 
     <div>
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control">
     </div>
     <div>
          <label for="text" class="form-label">Password</label>
          <input type="password" name="password" class="form-control">
     </div>
     <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
        function validation(){
            let email = document.loginForm.email.value;
            let password = document.getElementById("password").value;

            if(email == "" && password =="") {
                return alert("All Fields are Required");
            }
        }
    </script>
</body>
</html>