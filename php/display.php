<?php 

session_start();

require_once('connect.php');
$query = "select * from profile_data";
$result = mysqli_query($con,$query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Profile View Page</title>
</head>
<body class="bg-dark">
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card mt-5">
            <div class="card-header">
              <h2 class="display-6 text-center">Welcome
                <?php
                    echo $_SESSION['username'];
                ?>
              </h2>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <td> Age </td>
                  <td> Date of Birth </td>
                  <td> Phone </td>
                  <td> Address </td>
                  <td> Update </td>
                  <td> Delete </td>
                </tr>
                <tr>
                <?php
                
                if($result->num_rows>0){
                
                  while($row = mysqli_fetch_assoc($result))
                  {
                ?>
                  <td><?php echo $row['age']; ?></td>
                  <td><?php echo $row['dob']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><a href="profile.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>  
                  <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>  
                </tr>
                <?php    
                  }
                }
                else{
                    header('location:profile.php');
                }
                
                ?>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>