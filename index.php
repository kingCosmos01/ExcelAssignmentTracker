<?php 
    session_start();

    if(isset($_SESSION['user']))
    {
        header("Location: http://localhost/extracker/home/");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments Tracker</title>
    <link rel="stylesheet" href="./public/css/home.css">
</head>
<body>
    <div class="center"></div>
    <div class="head">
        <h2>Welcome to Assignments Tracker</h2>
        <small>Create Account / Login to Start Receving Assignments</small>
    </div>
    <ul class="content">
        <li><a href="http://localhost/extracker/public/views/register.php">Create Account</a></li>
        <li><a href="http://localhost/extracker/public/views/login.php">Login to Dashboard</a></li>
    </ul>
</body>
</html>