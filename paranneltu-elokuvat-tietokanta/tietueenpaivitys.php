<?php session_start(); 
// Jos käyttäjä ei ole kirjautunut, ohjataan kirjautumissisvulle: 
if (!isset($_SESSION['app6_islogged']) || $_SESSION['app6_islogged'] !== true) { 
header("Location: http://" . $_SERVER['HTTP_HOST'] 
                           . dirname($_SERVER['PHP_SELF']) . '/' 
                           . "login.php"); 

exit; 
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<?php 

require_once('config.php');
require_once('dbopen.php');

// Otetaan data talteen:
$enimi   = (isset($_REQUEST['enimi']))   ?
                $_REQUEST['enimi'] : ''; 
				
$vuosi   = (isset($_REQUEST['vuosi']))   ?
                $_REQUEST['vuosi'] : '';

$nayttelijat   = (isset($_REQUEST['nayttelijat']))   ?
                $_REQUEST['nayttelijat'] : ''; 
				
$ohjaaja   = (isset($_REQUEST['ohjaaja']))   ?
                $_REQUEST['ohjaaja'] : ''; 

$genre   = (isset($_REQUEST['genre']))   ?
                $_REQUEST['genre'] : ''; 

$id   = (isset($_REQUEST['id']))   ?
                $_REQUEST['id'] : ''; 
				
							


				
$sql = "UPDATE elokuvat 
            SET enimi='$enimi', vuosi='$vuosi', nayttelijat='$nayttelijat', ohjaaja='$ohjaaja', genre='$genre'
			WHERE id = '$id';
			"; 


$result = mysql_query($sql);
require_once('dbclose.php');

echo '<a href="listaa.php">Listaus</a>';





?>
</body>
</html>
