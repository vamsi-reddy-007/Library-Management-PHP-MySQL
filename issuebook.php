<?php 
session_start();
if(is_null($_SESSION["user"]))
{
 header("Location:home.php");
}
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $isbn=$_POST['isbn'];
    $id=$_POST['id'];
    $conn=mysqli_connect('localhost','root','','library') or die(mysqli_error($conn));
    $book=mysqli_query($conn,"select isbnno,bookname,authorname,category from books where isbnno='$isbn';");
    $bdata=mysqli_fetch_assoc($book);
    if($bdata==null){
        echo "<script>alert('Please Add the book')</script>";
        header('Refresh:0,url=addbook.php');
    }
    else{
    $isb=$bdata['isbnno'];
    $bookname=$bdata['bookname'];
    $stu=mysqli_query($conn,"select id,name from register where id='$id';");
    $sdata=mysqli_fetch_assoc($stu);
    if($sdata==null)
    {
        echo "<script>alert('StudentId is not found')</script>";
        header('Refresh:0,url=signup.php');

    }
    else{
    $sid=$sdata['id'];
    $sname=$sdata['name'];
    $duplicate=mysqli_query($conn,"select isbn from issued where isbn='$isbn';");
    $dup=mysqli_fetch_assoc($duplicate);
      if($dup==null){
        $issue=mysqli_query($conn,"INSERT into ISSUED values('$isbn','$bookname','$sid','$sname');");
        if($issue){
        echo "<script>alert('Book Issued')</script>"; 
        }      
      }
      elseif($dup["isbn"]=="$isbn"){

        echo "<script>alert('Book Is not available')</script>";  
      }
      else{
        $issue=mysqli_query($conn,"INSERT into ISSUED values('$isb','$bookname','$sid','$sname');");
        if($issue){
        echo "<script>alert('Book s Issued')</script>"; 
        }
      } 
    }  
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Book</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="ibform.css">
</head>
    <body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">VIJAYAM</h2>
            </div>
        </div>   
        <div class="content">
            <h1>ISSUE BOOKS<br><span>TO STUDENTS</span><br>HERE</h1>
            <p class="par">Hi Welcome to the Vijayam Library Management System</p>
            <div class="ibform">
                <h2>ISSUE BOOKS</h2><br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" required>
                    <label for="book">BOOK NO</label>
	                <input type="text" name="isbn" placeholder="Enter Book Number" required><br><br>
                    <label for="studentid">TO</label>
                    <input type="text" name="id" placeholder="Enter StudentId" required>
                    <button class="btnn" type="submit">ISSUE</button>
                    <button class="btnn" type="submit"><a href="books.php">BACK</a></button>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
