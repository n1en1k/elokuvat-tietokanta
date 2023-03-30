<?php 
session_start(); 

if (isset($_SESSION['search'])) { 
    unset($_SESSION['search']); 
} 

if (isset($_SESSION['searchi'])) { 
    unset($_SESSION['searchi']); 
} 

if (isset($_SESSION['laj'])) { 
    unset($_SESSION['laj']); 
} 

if (isset($_SESSION['laji'])) { 
    unset($_SESSION['laji']); 
} 

if (isset($_SESSION['limited'])) { 
    unset($_SESSION['limited']); 
} 

header('location: listaa.php');
?>