<?php

$login = 0;
$invalid = 0;

if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $username=$_POST['username'];
  $password=$_POST['password'];

  
  $sql="select * from `registration`
  where username='$username' and password='$password'";

  $result=mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
        // echo "Login Successful";   
        $login=1;   
        session_start();
        $_SESSION['username']=$username;
        header('location:profile.php');
    }else{
        // echo "Invalid credentials. Please try again.";
        $invalid=1;
    }
  }
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link rel="stylesheet" href="../css/login.css" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
</head>

<body>

<?php

if($invalid){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Invalid credentials.</strong> Please try again.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

<?php

if($login){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You are successfully logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

  <h1 class="text-center">Login</h1>

  <div class="container mt-5">

    <form action="login.php" method="post" class="login-form">
      
      <div class="form-group">
        <label for="exampleInputUsername" class="form-label">username</label>
        <input type="name" class="form-control" placeholder="Enter your username" name="username">        
      </div>      

      <div class="form-group">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Enter your password" name="password">
      </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>

    </form>

    <div>
        <p>Don't have an account? 
            <a href="register.php" class="signup-btn2">Sign Up</a>
        </p>
    </div>

  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>