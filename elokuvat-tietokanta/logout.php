<?php 
session_start(); 

if (isset($_SESSION['app5_islogged'])) { 
    unset($_SESSION['app5_islogged']); 
} 

header("Location: http://" . $_SERVER['HTTP_HOST'] 
                           . dirname($_SERVER['PHP_SELF']) . '/' 
                           . "listaa.php"); 
?>