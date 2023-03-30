<?php session_start(); 
// Jos käyttäjä ei ole kirjautunut, ohjataan kirjautumissisvulle: 
if (!isset($_SESSION['app5_islogged']) || $_SESSION['app5_islogged'] !== true) { 
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
$muutet = $_GET['muutettava'];

require_once('config.php');
require_once('dbopen.php');

//Kysely
$query = "SELECT id, enimi, vuosi, nayttelijat, ohjaaja, genre FROM elokuvat WHERE id = '$muutet';";
$result= mysql_query($query)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());


// Käydään rivejä niin kauan kuin niitä riittää
while ($rivi = mysql_fetch_array ($result)) {
   echo 
         
		 
		 "<form method='post' action='tietueenpaivitys.php'>

Syötä elokuvan nimi: <br />
<input type='text' name='enimi' value='{$rivi['enimi']}' /><br />
Syötä valmistusvuosi: <br />
<input type='text' value='{$rivi['vuosi']}' name='vuosi' /><br />
Syötä näyttelijät: <br />
<input type='text' value='{$rivi['nayttelijat']}' name='nayttelijat' /><br />
Syötä ohjaajan nimi: <br />
<input type='text' value='{$rivi['ohjaaja']}' name='ohjaaja' /><br />
Syötä genre: <br />
<input type='text' value='{$rivi['genre']}' name='genre' /><br /><br />

<input type='hidden' value='{$rivi['id']}' name='id' />
<input type='submit' value='tallenna' name='Tallennus' />

</form>";
		 

} 



require_once('dbclose.php');







?>

</body>
</html>
