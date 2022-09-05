<?php

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $name=$_POST['name'];
    $pwd=$_POST['password'];   
    $conn=mysqli_connect('localhost','root','','library') or die(mysqli_error($conn));
   $query=mysqli_query($conn,"select * from admin");         
    $data =mysqli_fetch_assoc($query);
    if($data["username"]!="$name"){
        echo "<script>alert('Username doesnot exist!.')</script>";  
    }
    else{
        
        if($pwd==$data["password"]){
           session_start();
           $_SESSION["user"]=$name;
           header("location:adminhome.php");
        }
        else{
           
            echo "<script>alert('password is Incorrect')</script>";  
            
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">VIJAYAM</h2>
            </div>            
        </div>
        <div class="content">
            <h1>HEY<br><span>ADMIN LOGIN</span> <br>HERE</h1>
            <p class="par">Hi Welcome to the Vijayam Library Management System</p>
                <div class="aform">
                    <h2>AdminLogin</h2>
                    <input type="text" name="name" placeholder="Enter Username Here" required>
                    <input type="password" name="password" placeholder="Enter Password Here" required><br><br>
                    <button class="btnn" type="submit">LoginHere</button>
	            </div>
        </div>
    </div>
</form>
</body>
</html>