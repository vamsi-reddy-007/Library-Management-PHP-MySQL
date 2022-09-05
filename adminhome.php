<?php 
session_start();
if(is_null($_SESSION["user"]))
{
 header("Location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index page</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="main">
        <div class="navbar">
        <div class="icon">
             <h2 class="logo">VIJAYAM</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="about.php">ABOUTUS</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="contact.php">CONTACT</a></li>                    
                <li><a href="signup.php">REGISTRATION</a></li>
            </ul>
        </div>
        <div class="search">
        <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="logout.php"> <button class="btn">LOGOUT</button></a>
        </div>
        </div>    
        <div class="content">
            <h1>WELCOME<br><span>HOME ADMIN</span><br>HOW ARE YOU</h1><br>
            <p class="par">Hi Welcome to the Vijayam Library Management System</p>   
        </div>
</body>
</html>