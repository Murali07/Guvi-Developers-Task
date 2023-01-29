<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../css/profile.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="profile">   

      <h1 class="welcome text-center mt-5">Welcome
          <?php
          echo $_SESSION['username'];
          ?>
      </h1>

      <div class="container">
        <form class="profile-form" action="profile.php" method="post">
          <div class="w-50 mb-4">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control">          
          </div>
          <div class="w-50 mb-4">
            <label class="form-label">Date Of Birth</label>
            <input type="date" name="dob" class="form-control">
          </div>
          <div class="form-outline w-50 mb-4">
            <label class="form-label" for="form6Example6">Phone</label>
            <input type="number" id="form6Example6" class="form-control" />            
          </div>
          <div class="form-outline w-50 mb-4">
            <label class="form-label" for="textAreaExample">Address</label>
            <textarea class="form-control" name="address" rows="4"></textarea>
            
          </div>
          <div>
            <button type="submit" class="btn btn-primary w-50 mb-4">Update Profile</button>
          </div>
          
        </form>
      </div>
      

      <div class="container">
          <a href="logout.php" class="btn btn-primary mt-5">Logout</a>               
      </div>
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>


