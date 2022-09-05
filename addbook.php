<?php
session_start();
if(is_null($_SESSION["user"]))
{
 header("Location:home.php");
}
if($_SERVER["REQUEST_METHOD"]== "POST"){ 

    $isbn=$_POST['isbn'];
    $bookname=$_POST['book'];  
    $author=$_POST['author']; 
    $category=$_POST['category'];  
    $con=mysqli_connect('localhost','root','','library') or die(mysqli_error($con));     
   $duplicate=mysqli_query($con,"select isbnno from books where isbnno='$isbn';");
  $dup=mysqli_fetch_assoc($duplicate);
  if($dup==null){
          $sql="INSERT INTO books VALUES('$isbn','$bookname','$author','$category')";   
          if(mysqli_query($con,$sql)){  
          echo "<script>alert('Book successfully added')</script>"; 
          } 
  }
  elseif($dup["isbnno"]=="$isbn"){
   echo "<script>alert('Already Book is existed')</script>"; 
  }else{
   $sql="INSERT INTO books VALUES('$isbn','$bookname','$author','$category')";   
     if(mysqli_query($con,$sql)){  
         echo "<script>alert('Book successfully added')</script>";
       }else {  
         echo "<script>alert('Book is not added')</script>";
        }
    }
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Books</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="addbook.css">
</head>
  <body>
    <div class="main">
    <div class="navbar">
    <div class="icon">
      <h2 class="logo">VIJAYAM</h2>
    </div>
    </div>        
      <div class="content">
        <h1>ADD<br><span>NEW BOOKS</span> <br>HERE</h1>
        <p class="par">Hi Welcome to the Vijayam Library Management System</p>
      <div class="aform">
        <h2>ADD BOOK</h2>
           	 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	                  <input type="text" name="isbn" placeholder="Enter Book Number" required>
                    <input type="text" name="book" placeholder="Enter Book Name" required>
                    <input type="text" name="author" placeholder="Enter Author Name" required><br><br>
                    <label for="category">SELECT CATEGORY</label><br>
                    <select name="category" required>
                      <option value="computers">Computers</option>
                      <option value="science">Science</option>
                      <option value="statistics">Statistics</option>
                    </select>
                    <button class="btnn" type="submit">ADD</button>
                    <button class="btnn" type="submit"> <a href="books.php">BACK</a></button>
           	  </form>
        </div>
        </div>
    </div>
</body>
</html>