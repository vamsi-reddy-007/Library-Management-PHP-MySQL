<?php 
session_start();
if(is_null($_SESSION["user"]))
{
 header("Location:home.php");
}
    $conn=mysqli_connect("localhost", "root", "", "library");
    $result=mysqli_query($conn,"select *from issued;");  
?>

<?php 
	if (isset($_GET['isbn'])) {
		$isbn=$_GET['isbn'];
		$query1="delete from issued where isbn='$isbn'";
		$run1=mysqli_query($conn,$query1);
		if ($run1) {
			header('Location: issued.php');
		}
		else{
			echo "<script>alert('Book is not returned')</script>";
			header('Refresh: 5; url=books.php');
		}
	}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issued Books</title>
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
            <tr><h1>ISSUED BOOKS<br></h1></tr><br>
            
            <th>BOOK NO</th>
            <th>BOOK NAME</th>
            <th>STUDENT ID</th>
            <th>STUDENT NAME</th>
            <th>ACTION</th>
        </tr>
       <?php }
        ?>
        <tbody>
        <?php 

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $isbn=$row['isbn'];
        ?>
     
        <tr>
            <td><?php echo $row['isbn'];?></td>
            <td><?php echo $row['b_name'];?></td>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo "<a class='btn' href=issued.php?isbn=".$row['isbn'].">RETURN</a> "?></td>
           
        </tr>
     <?php
            }
        }else{

            echo "<script>alert('No books are issued')</script>";  
           header('Refresh: 0; url=books.php');
             
        }       
        ?>  
        </tbody>
        </table>
        </div>   
</div>
</body>
</html>