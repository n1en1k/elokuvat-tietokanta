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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
<head>
<title>Elokuvat</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php 

// Kirjautumattomat pääsevät kirjautumaan 
if (!isset($_SESSION['app5_islogged']) || $_SESSION['app5_islogged'] !== true) { 
    
   echo "<ul>
<li><a href='listaa.php'>Listaa</a></li>"; 
   echo "<li><a href='login.php'>Login</a></li>";
   echo "</ul>";
} else { // ja kirjautuneet uloskirjautumaan 
   echo "<ul>
<li><a href='listaa.php'>Listaa</a></li>"; 
   echo "<li><a href='logout.php'>Logout</a></li>";
   echo "<li><a href='lisaa-elokuva.php'>Lisää elokuva</a></li>
</ul>";

} 


?>
<?php



/*
lisayslomake.php
*/

?>
<form method="post" action="tallenna-uusi-elokuva.php">

Syötä elokuvan nimi: <br />
<input type="text" name="enimi" /><br />
Syötä valmistusvuosi: <br />
<input type="text" name="vuosi" /><br />
Syötä näyttelijät: <br />
<input type="text" name="nayttelijat" /><br />
Syötä ohjaajan nimi: <br />
<input type="text" name="ohjaaja" /><br />
Syötä genre: <br />
<input type="text" name="genre" /><br /><br />


<input type="submit" value="tallenna" name="tallenna" />

</form>


</body>
</html>
