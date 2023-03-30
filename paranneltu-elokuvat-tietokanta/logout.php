<?php 
session_start(); 

if (isset($_SESSION['app6_islogged'])) { 
    unset($_SESSION['app6_islogged']); 
} 

header("Location: http://" . $_SERVER['HTTP_HOST'] 
                           . dirname($_SERVER['PHP_SELF']) . '/' 
                           . "listaa.php"); 
?>