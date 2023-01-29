<?php
$hostname = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'signupform';

$con = mysqli_connect($hostname, $username, $password, $database);

if(!$con){
    die(mysqli_connect_error($con));
}

?>