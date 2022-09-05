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
    <title>aboutpage</title>
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
            <h1 align="center"><span>ABOUT US</span></h1><br>
            <p class="par" >Library Management System is a project which aims in developing a computerized system to maintain all the daily work of the library. It is used by librarian to manage the library using a computerized system where he/she can record various transactions like issue of books, return of books, addition of new books, addition of new students etc.<br><br>
             The project also includes the facility to view the books which are available and those which are issued and all the books in the library.
     This project is basically a desktop application which means self-contained software runs on the system on which it has been installed under the user control and it will work for a particular institute or college only.

</p>   
        </div>
</body>
</html>