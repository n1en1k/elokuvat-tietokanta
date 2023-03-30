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
$poistet = $_GET['poistettava'];

require_once('config.php');
require_once('dbopen.php');

// Otetaan data talteen:



				
$sql = "DELETE FROM elokuvat 
			WHERE id = '$poistet';
			"; 


$result = mysql_query($sql);
require_once('dbclose.php');

echo '<h2>Poisto onnistui!</h2>';
echo '<a href="listaa.php">Listaus</a>';





?>
</body>
</html>
