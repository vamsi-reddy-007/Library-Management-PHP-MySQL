<?php 

session_start();

if(is_null($_SESSION["user"]))
{
 header("Location:home.php");
}
    $result="";
    $conn=mysqli_connect("localhost", "root", "", "library");
    $result=mysqli_query($conn,"select isbnno,bookname,authorname,category from books where isbnno not in (select isbn from issued);");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Books</title>
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
        
<div class="table">
    <table id="table" border="2px">
        <?php
        if($result==""){
          die;
            
        }elseif($result->num_rows>0){ 
             
        ?>
            <h1>AVAILABLE BOOKS<br></h1><br>
            <th>BOOK NO</th>
            <th>BOOK NAME</th>
            <th>AUTHOR NAME </th>
            <th>CATEGORY</th>
            <th>ACTION</th>
        </tr>
       <?php }
        ?>
        <tbody>
        <?php 

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
        ?>
     
        <tr>
            <td><?php echo $row['isbnno'];?></td>
            <td><?php echo $row['bookname'];?></td>
            <td><?php echo $row['authorname'];?></td>
            <td><?php echo $row['category'];?></td>
            <td><a href="issuebook.php" class='btn'>ISSUE</a></td>
        </tr>

        <?php
            }
        }else{
            echo "<script>alert('No books are available')</script>";  
            header('Refresh: 0; url=books.php');
        }
        ?>
        </tbody>
    </table>
</div>   
</div>
</body>
</html>