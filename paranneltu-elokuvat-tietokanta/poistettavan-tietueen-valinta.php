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

//Kysely
$query = "SELECT id, enimi, vuosi, nayttelijat, ohjaaja, genre FROM elokuvat;";
$result= mysql_query($query)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

echo "<table width='900' border='1' cellpadding='5' cellspacing='5'><tr><td><b>ID</b></td><td><b>Elokuvan nimi</b></td><td><b>Vuosi</b></td><td><b>Näyttelijät</td><td><b>Ohjaaja</b></td><td><b>Genre</b></td></tr>";

// Käydään rivejä niin kauan kuin niitä riittää
while ($rivi = mysql_fetch_array ($result)) {
   echo 
         "<tr><td><a href='tietueenpoisto.php?poistettava={$rivi['id']}'>{$rivi['id']}</a></td>" .
         "<td>{$rivi['enimi']}</td>" .
      	 "<td>{$rivi['vuosi']}</td>" .
		 "<td>{$rivi['nayttelijat']}</td>" .
		 "<td>{$rivi['ohjaaja']}</td>" .
		 "<td>{$rivi['genre']}</td></tr>";
} 

echo "</table>";

require_once('dbclose.php');

?>

</body>
</html>
