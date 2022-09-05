<?php
session_start();

if(is_null($_SESSION["user"]))
{
 header("Location:home.php");
}
if($_SERVER["REQUEST_METHOD"]== "POST"){ 

    $isbn=$_POST['isbn'];
    $category=$_POST['category'];  
    $con=mysqli_connect('localhost','root','','library') or die(mysqli_error($con));     
    $duplicate=mysqli_query($con,"select isbnno from books where isbnno='$isbn';");
    $dup=mysqli_fetch_assoc($duplicate);
    if($dup==null){
          echo "<script>alert('Book Is not existed')</script>"; 
    }
    else{
        $sql="DELETE FROM books where isbnno='$isbn'"; 
        if(mysqli_query($con,$sql)){  
         echo "<script>alert('Book successfully deleted')</script>"; 
         header('Refresh: 0; url=books.php'); 
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Book</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="deletebook.css">
</head>
    <body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">VIJAYAM</h2>
            </div>
        </div>   
        <div class="content">
            <h1>DELETE <br><span>THE BOOKS</span><br>HERE</h1>
            <p class="par">Hi Welcome to the Vijayam Library Management System</p>
            <div class="dform">
                <h2>DELETE BOOK</h2><br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" required>
                    <label for="book">BOOK NO</label>
	                <input type="text" name="isbn" placeholder="Enter Book Number" required><br><br>
                    <label for="category">SELECT CATEGORY</label>
                    <select name="category" required>
                      <option value="computers">computers</option>
                      <option value="science">Science</option>
                      <option value="statistics">statistics</option>
                    </select>
                    <button class="btnn" type="submit">DELETE</button>
                    <button class="btnn" type="submit"><a href="books.php">BACK</a></button>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>