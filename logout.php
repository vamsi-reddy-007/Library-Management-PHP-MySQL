<?php
session_start();
unset($_SESSION['user']);
session_destroy(); 
echo "<script>alert('logged out successfully')</script>";  
header('Refresh: 0; url=home.php');
?>