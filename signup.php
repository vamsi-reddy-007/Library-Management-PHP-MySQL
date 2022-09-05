<?php
if(isset($_POST['id']))
{  
    $id=$_POST['id'];
    $sname=$_POST['sname'];  
    $year=$_POST['year'];  
    $sec=$_POST['sec'];  
    $con=mysqli_connect('localhost','root','','library') or die(mysqli_error($con));     
    $sql="INSERT INTO register VALUES('$id','$sname','$year','$sec')";   
     if(mysqli_query($con,$sql))
       {
            echo"<script>alert('Successfully Registered')</script>";
            header('Refresh: 0; url=books.php');
       }
     else
       {
        echo "<script>alert('All fields are Required')</script>";
       }    
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student registration</title>
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
            <h1>STUDENTS<br><span>REGISTER</span><br>HERE</h1>
            <p class="par">Hi Welcome to the Vijayam Library Management System</p>
             <div class="form">
                <h2>New User</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" required>
	                <input type="text" name="id" placeholder="Enter Student ID" required>
                    <input type="text" name="sname" placeholder="Enter Student Name" required><br><br>
                    <label for="year">SELECT ACADEMIC YEAR</label><br>
                    <select name="year" required>
                        <option value="1">1st year</option>
                        <option value="2">2nd year</option>
                        <option value="3">3rd year</option>
                    </select>
                    <input type="text" name="sec" placeholder="Enter Section" required>
                    <button class="btnn" type="submit">Register</button>
                    <button class="btnn" type="submit"> <a href="books.php">BACK</a></button>
                </form>
               </div>
                </div>
                </div>
        </div>
    </body>
</html>
