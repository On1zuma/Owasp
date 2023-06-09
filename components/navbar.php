<?php
require_once 'Controller/loginController.php';
require_once 'Controller/registerController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_id'])) {
    var_dump($_SESSION['user_id']);
    var_dump($_SESSION['pseudonyme']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBD - OWASP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Owasp</a>
  <ul class="navbar-nav mr-auto" style="display:flex; flex-direction:row; gap:1rem;">

 <?php if (isset($_SESSION['user_id'])) {  ?>
    <li class="nav-item active">
        <a class="nav-link" href="dashboard.php"> Dashboard</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="logout.php"> Logout</a>
    </li>
  <?php } else { ?>
    <li class="nav-item active">
        <a class="nav-link" href="login.php"> Login</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="register.php"> Register</a>
    </li>
    <?php } ?>

    </ul>


</nav>