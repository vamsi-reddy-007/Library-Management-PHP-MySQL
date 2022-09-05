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
    <title>AdminHome</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="books.css">
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">VIJAYAM</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="adminhome.php">HOME</a></li>
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
               <h1>YOU CAN DO<br><span>ANYTHING YOU</span><br>WANT HERE</h1>
               <p class="par">Hi Welcome to the Vijayam Library Management System</p>
                <div class="bform">
	                <h2>YOU CAN DO</h2>
                    <a href="addbook.php"><button class="btnn" type="submit">AddBook</button></a> 
                    <a href="deletebook.php"><button class="btnn" type="submit">DeleteBook</button></a>            
                    <a href="issuebook.php"><button class="btnn" type="submit">IssueBook</button></a>
                    <a href="allbooks.php"><button class="btnn" type="submit">AllBooks</button></a>
                    <a href="availablebooks.php"><button class="btnn" type="submit">AvailableBooks</button></a>
                    <a href="issued.php"><button class="btnn" type="submit">IssuedBooks</button></a>
                </div>
            </div>
    </div>
</body>
</html>