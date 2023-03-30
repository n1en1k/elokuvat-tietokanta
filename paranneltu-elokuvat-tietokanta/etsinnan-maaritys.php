<?php
session_start(); 

$_SESSION['searchied'] = (isset($_GET['etsi']))   ?
                $_GET['etsi'] : '';



 $_SESSION['searchi'] = mysql_real_escape_string( $_SESSION['searchied']);

if($_SESSION['searchi'] == "") {
	$_SESSION['search'] = "";

}
else {

$_SESSION['search'] = " WHERE enimi LIKE '%$_SESSION[searchi]%' OR nayttelijat LIKE '%$_SESSION[searchi]%'";
}

header('location: listaa.php');
?>