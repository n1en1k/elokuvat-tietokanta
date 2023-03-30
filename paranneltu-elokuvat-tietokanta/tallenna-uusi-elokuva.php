<?php session_start(); 
// Jos käyttäjä ei ole kirjautunut, ohjataan kirjautumissisvulle: 
if (!isset($_SESSION['app6_islogged']) || $_SESSION['app6_islogged'] !== true) { 
header("Location: http://" . $_SERVER['HTTP_HOST'] 
                           . dirname($_SERVER['PHP_SELF']) . '/' 
                           . "login.php"); 

exit; 
} 

/*
tallenna.php
*/



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

				
							


				
$sql = "INSERT INTO elokuvat (
            enimi,
            vuosi,
			nayttelijat,
            ohjaaja,
			genre
            ) VALUES (
           '$enimi',
           '$vuosi',
		   '$nayttelijat',
           '$ohjaaja',
		   '$genre'
            )"; 


$result = mysql_query($sql);
require_once('dbclose.php');

echo '<a href="listaa.php">Listaus</a>';
?>