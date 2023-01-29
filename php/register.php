<?php

$success = 0;
$user = 0;

if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];

  
  $sql="select * from `registration`
  where username='$username'";

  $result=mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
      // echo "User already exist!";
      $user = 1;
    }else{
      $sql="insert into `registration`(username, email, password)
      values('$username','$email','$password')";
      $result=mysqli_query($con, $sql);

      if($result){
        // echo "Signup Successful";
        $success = 1;
        header('location:login.php');
      }
      else{
        die(mysqli_error($con));
      }

    }
  }
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Signup Page</title>
  <link rel="stylesheet" href="../css/register.css" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

<?php

if($user){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> User already exist.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

<?php

if($success){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You are successfully signed up.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

  <h1 class="text-center">Sign Up</h1>

  <div class="container mt-5">

    <form action="register.php" method="post" class="signup-form">
      
      <div class="form-group">
        <label for="exampleInputUsername" class="form-label">username</label>
        <input type="name" class="form-control" placeholder="Enter your username" name="username">        
      </div>

      <div class="form-group">
        <label for=" exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" placeholder="Enter your email" name="email">        
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Enter your password" name="password">
      </div>

      <button type="submit" class="btn btn-primary w-100">Sign Up</button>

    </form>

    <div>
      <p>Already have an account?
      <a href="login.php" class="login-btn2">Login</a>
      </p>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>