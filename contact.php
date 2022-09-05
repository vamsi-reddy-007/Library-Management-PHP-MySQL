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
    <title>contact page</title>
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
                <a href="#"> <button class="btn">Search</button></a>
        </div>
        </div>    
        <div class="content">
            <h1>CONTACT US HERE</h1><br>
            <p class="par">Name: C R KRANTHI<br>contact: 9876543201<br>Email: kranthi12345@gmail.com<br>Qualification: BCA.
            </p>   
        </div>
</body>
</html>