<?php session_start();  ?>
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
<li><a href='logout.php'>Logout</a></li>"; 
   echo "<li><a href='listaa.php'>Listaa</a></li>";
   echo "<li><a href='lisaa-elokuva.php'>Lisää elokuva</a></li>";
   echo "<li><a href='muutettavan-tietueen-valinta.php'>Muuta tietueen kenttiä</a></li>";
   echo "<li><a href='poistettavan-tietueen-valinta.php'>poista tietue</a></li>

</ul>";

} 


?>
<?php



$_SESSION['search'] = (isset($_SESSION['search']))   ?
                $_SESSION['search'] : '';


$_SESSION['searchi'] = (isset($_SESSION['searchi']))   ?
                $_SESSION['searchi'] : '';






/*
	listaa.php
*/
echo "Etsi elokuvan tai näyttelijän nimellä:<br />";
echo "<form method='get' action='etsinnan-maaritys.php'><input type='text' value='$_SESSION[searchi]' name='etsi' /><input type='submit' value='Hae' name='hae-painike' /></form>";


echo "<a href='lajittelun-maaritys.php?lajittelu=nn'>Näyttelijän mukaan nouseva</a><br />";
echo "<a href='lajittelun-maaritys.php?lajittelu=nl'>Näyttelijän mukaan laskeva</a><br />";
 echo "<a href='lajittelun-maaritys.php?lajittelu=vn'>Vuoden mukaan nouseva</a><br />";
echo "<a href='lajittelun-maaritys.php?lajittelu=vl'>Vuoden mukaan laskeva</a><br />";

echo "<a href='lajittelun-maaritys.php?lajittelu=nvn'>Näyttelijän ja vuoden mukaan nouseva</a><br />";

echo "<a href='lajittelun-maaritys.php?lajittelu=nvl'>Näyttelijän ja vuoden mukaan laskeva</a><br />";


echo "<a href='lajittelun-maaritys.php?lajittelu=en'>Elokuvan nimen mukaan nouseva</a><br />";

echo "<a href='lajittelun-maaritys.php?lajittelu=el'>Elokuvan nimen mukaan laskevasti</a><br />";


echo "<a href='lajittelun-maaritys.php?lajittelu=on'>Ohjaajan mukaan nousevasti</a><br />";
echo "<a href='lajittelun-maaritys.php?lajittelu=ol'>Ohjaajan mukaan laskevasti</a><br />";




echo "<a href='lajittelun-maaritys.php?lajittelu=g'>genren mukaan</a><br />";

echo "<a href='haun-nollaus.php'>Nollaa haku / lajittelu / näytettävä määrä / etsintä</a>";
echo "<br />";
echo "<br />";


$_SESSION['laj'] = (isset($_SESSION['laj']))   ?
                $_SESSION['laj'] : '';


$_SESSION['limited'] = (isset($_SESSION['limited']))   ?
                $_SESSION['limited'] : '20';


require_once('config.php');
require_once('dbopen.php');

$derpi = "SELECT id FROM elokuvat";
$derpsult= mysql_query($derpi)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

$num_movies = mysql_num_rows($derpsult);

echo "Näytetään kerralla: <b>$_SESSION[limited]</b><br />";
echo "Näytä:  <b> <a href='listauksen-maaritys.php?limitti=20'>20</a> </b><b> <a href='listauksen-maaritys.php?limitti=25'>25</a> </b><b> <a href='listauksen-maaritys.php?limitti=50'>50</a> </b><b> <a href='listauksen-maaritys.php?limitti=100'>100</a> </b><b> <a href='listauksen-maaritys.php?limitti=kaikki&amp;m=$num_movies'>Kaikki</a> </b>";

 




/*
 $_SESSION['searchi'] = mysql_real_escape_string( $_SESSION['searchie']);
*/







//Kysely
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $_SESSION['limited']; 



$query = "SELECT id, enimi, vuosi, nayttelijat, ohjaaja, genre FROM elokuvat$_SESSION[search]$_SESSION[laj] LIMIT $start_from, $_SESSION[limited];";
$result= mysql_query($query)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());


$num_rows = mysql_num_rows($result);





echo "<p>Elokuvia yhteensä $num_movies elokuvaa</p>";
echo "<p>Näkyvissä yhteensä $num_rows elokuvaa</p>";
echo "<table width='1100' border='1' cellpadding='5' cellspacing='5'><tr><td><b>Elokuvan nimi</b></td><td><b>Vuosi</b></td><td><b>Näyttelijät</td><td><b>Ohjaaja</b></td><td><b>Genre</b></td></tr>";

// Käydään rivejä niin kauan kuin niitä riittää
while ($rivi = mysql_fetch_array ($result)) {
   echo 
         "<tr><td width='20%'>{$rivi['enimi']}</td>" .
      	 "<td width='5%'>{$rivi['vuosi']}</td>" .
		 "<td width='45%'>{$rivi['nayttelijat']}</td>" .
		 "<td width='20%'>{$rivi['ohjaaja']}</td>" .
		 "<td width='10%'>{$rivi['genre']}</td></tr>";
} 

echo "</table>";

$sql = "SELECT COUNT(enimi) FROM elokuvat$_SESSION[search]"; 
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / $_SESSION['limited']); 
 
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='listaa.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<p>Elokuvia yhteensä $num_movies elokuvaa</p>";
echo "<p>Näkyvissä yhteensä $num_rows elokuvaa</p>";
require_once('dbclose.php');

?>
</body>
</html>
