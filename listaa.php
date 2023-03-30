<?php session_start();  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
<head>
<title>Elokuvat</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="tietokanta-tyylit.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<div id="container">
    	<div id="header">
        	<div id="headercore">
            <?php 

// Kirjautumattomat pääsevät kirjautumaan 
if (!isset($_SESSION['app5_islogged']) || $_SESSION['app5_islogged'] !== true) { 
    
   echo "<ul>
<li><a href='index.php'>Etusivu</a></li>
<li class='current'><a href='listaa.php'>Listaa</a></li>"; 
   echo "<li><a href='login.php'>Login</a></li>";
   echo "</ul>";
} else { // ja kirjautuneet uloskirjautumaan 
   echo "<ul>
<li><a href='index.php'>Etusivu</a></li>
<li><a href='logout.php'>Logout</a></li>"; 
   echo "<li class='current'><a href='listaa.php'>Listaa</a></li>";
   echo "<li><a href='lisaa-elokuva.php'>Lisää elokuva</a></li>";
   echo "<li><a href='muutettavan-tietueen-valinta.php'>Muuta tietueen kenttiä</a></li>";
   echo "<li><a href='poistettavan-tietueen-valinta.php'>poista tietue</a></li>";
   echo "<li><a href='uuden-kayttajan-lisays.php'>Lisää käyttäjä</a></li>";
   echo "<li>Kirjautunut: {$_SESSION['uid']}</li>";

echo "</ul>";

} 


?>
            </div> <!-- headercoren loppu -->
        </div> <!-- headerin loppu -->
    	<div id="clear1"></div>
    	<div id="banner">
        	<div id="bannercore">
            	<div id="bannercoretop">
                <h1>Nikon <b>Elokuvat</b></h1>
                <h2>Elokuvat pidentävät ikää</h2>
                </div> <!--bannercoretopin loppu -->
                <div id="bannercorebottom">
                </div> <!-- bannercorebottomin loppu -->
            </div> <!-- bannercoren loppu -->
        
        </div> <!-- bannerin loppu -->
    	<div id="content">
        	<div id="contentcore">
            	<div id="contentcoretop">

<?php



$_SESSION['search'] = (isset($_SESSION['search']))   ?
                $_SESSION['search'] : '';


$_SESSION['searchi'] = (isset($_SESSION['searchi']))   ?
                $_SESSION['searchi'] : '';







	// listaa.php

echo "Hae elokuvan-, näyttelijän- tai ohjaajan nimenosalla:<br />";
echo "<form method='get' action='etsinnan-maaritys.php'><input type='text' value='$_SESSION[searchi]' name='etsi' /><input type='submit' value='Hae' name='hae-painike' /></form>";
echo "<br /><br /><a href='haun-nollaus.php'>Nollaa haku / lajittelu / näytettävä määrä / etsintä</a>";
/*
echo "<h4>Lajitteluvaihtoehdot:</h4>";
echo "<ul>";
echo "<li>";
echo "<a href='lajittelun-maaritys.php?lajittelu=nn'>Näyttelijän mukaan nouseva</a>";
echo "</li><li>";
echo "<a href='lajittelun-maaritys.php?lajittelu=nl'>Näyttelijän mukaan laskeva</a>";
echo "</li><li>";
echo "<a href='lajittelun-maaritys.php?lajittelu=vn'>Vuoden mukaan nouseva</a>";
echo "</li><li>";
echo "<a href='lajittelun-maaritys.php?lajittelu=vl'>Vuoden mukaan laskeva</a>";
echo "</li><li>";
echo "<a href='lajittelun-maaritys.php?lajittelu=nvn'>Näyttelijän ja vuoden mukaan nouseva</a>";
echo "</li><li>";
echo "<a href='lajittelun-maaritys.php?lajittelu=nvl'>Näyttelijän ja vuoden mukaan laskeva</a>";
echo "</li><li>";

echo "<a href='lajittelun-maaritys.php?lajittelu=en'>Elokuvan nimen mukaan nouseva</a>";
echo "</li><li>";
echo "<a href='lajittelun-maaritys.php?lajittelu=el'>Elokuvan nimen mukaan laskevasti</a>";
echo "</li><li>";

echo "<a href='lajittelun-maaritys.php?lajittelu=on'>Ohjaajan mukaan nousevasti</a>";
echo "</li><li>";
echo "<a href='lajittelun-maaritys.php?lajittelu=ol'>Ohjaajan mukaan laskevasti</a>";

echo "</li><li>";


echo "<a href='lajittelun-maaritys.php?lajittelu=g'>genren mukaan</a>";
echo "</li><li>";
echo "<a href='haun-nollaus.php'>Nollaa haku / lajittelu / näytettävä määrä / etsintä</a></li>";
echo "</ul>";
*/
$_SESSION['laj'] = (isset($_SESSION['laj']))   ?
                $_SESSION['laj'] : '';


$_SESSION['laji'] = (isset($_SESSION['laji']))   ?
                $_SESSION['laji'] : '';

$_SESSION['limited'] = (isset($_SESSION['limited']))   ?
                $_SESSION['limited'] : '20';



echo "<h4>";
if($_SESSION['laji'] == "nn") {
	echo "Lajitellaan näyttelijöitten mukaan nousevasti";
}

else if($_SESSION['laji'] == "nl") {
	echo "Lajitellaan näyttelijöitten mukaan laskevasti";
}

else if($_SESSION['laji'] == "vn") {
	echo "Lajitellaan vuoden mukaan nousevasti";
}

else if($_SESSION['laji'] == "vl") {
	echo "Lajitellaan vuoden mukaan laskevasti";
}

else if($_SESSION['laji'] == "nvn") {
	echo "Lajitellaan näyttelijöiden ja vuoden mukaan nousevasti";
}


else if($_SESSION['laji'] == "nvl") {
	echo "Lajitellaan näyttelijöiden ja vuoden mukaan laskevasti";
}

else if($_SESSION['laji'] == "en") {
	echo "Lajitellaan elokuvan nimen mukaan nousevasti";
}

else if($_SESSION['laji'] == "el") {
	echo "Lajitellaan elokuvan nimen mukaan laskevasti";
}


else if($_SESSION['laji'] == "on") {
	echo "Lajitellaan ohjaajan nimen mukaan nousevasti";
}

else if($_SESSION['laji'] == "ol") {
	echo "Lajitellaan ohjaajan nimen mukaan laskevasti";
}


else if($_SESSION['laji'] == "gp") {
	echo "Lajitellaan genren mukaan nousevasti";
}

else if($_SESSION['laji'] == "gn") {
	echo "Lajitellaan genren mukaan laskevasti";
}

else if($_SESSION['laji'] == "arvp") {
	echo "Lajitellaan arvioinnin mukaan nousevasti";
}

else if($_SESSION['laji'] == "arvn") {
	echo "Lajitellaan arvioinnin mukaan laskevasti";
}


else if($_SESSION['laji'] == "") {
  echo "Lajittelua ei ole valittu";
}


echo "</h4>";


require_once('config.php');
require_once('dbopen.php');

$derpi = "SELECT id FROM elokuvat";
$derpsult= mysql_query($derpi)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

$num_movies = mysql_num_rows($derpsult);

echo "Näytetään kerralla: <b>$_SESSION[limited]</b><br />";
echo "<br />Näytä kerralla:  <b> <a href='listauksen-maaritys.php?limitti=20'>20</a> </b><b> <a href='listauksen-maaritys.php?limitti=25'>25</a> </b><b> <a href='listauksen-maaritys.php?limitti=50'>50</a> </b><b> <a href='listauksen-maaritys.php?limitti=100'>100</a> </b><b> <a href='listauksen-maaritys.php?limitti=kaikki&amp;m=$num_movies'>Kaikki</a> </b>";

 




/*
 $_SESSION['searchi'] = mysql_real_escape_string( $_SESSION['searchie']);
*/







//Kysely
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $_SESSION['limited']; 



$query = "SELECT id, enimi, vuosi, nayttelijat, ohjaaja, genre, arvostelu FROM elokuvat$_SESSION[search]$_SESSION[laj] LIMIT $start_from, $_SESSION[limited];";
$result= mysql_query($query)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());


$num_rows = mysql_num_rows($result);



$herpatus = "SELECT id FROM elokuvat$_SESSION[search];";
$slalollllo= mysql_query($herpatus)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());

$hakurivitmaara = mysql_num_rows($slalollllo);


if($_SESSION['searchi'] == "") {
}
else {
echo "<p>Haku tuotti $hakurivitmaara osumaa!</p>";
}
echo "<p>Elokuvia yhteensä $num_movies elokuvaa</p>";
echo "<p>Näkyvissä yhteensä $num_rows elokuvaa</p>";
echo "<table border='1' cellpadding='5' cellspacing='5'><tr><td>

<table><tr>
<td rowspan='2'><b>Elokuvan nimi</b></td>
<td><a href='lajittelun-maaritys.php?lajittelu=en'><img src='images/nuoliylos.png' /></a></td>
</tr>
<tr>

<td><a href='lajittelun-maaritys.php?lajittelu=el'><img src='images/nuolialas.png' /></a></td>
</tr>

</table>
</td><td>
<table><tr>
<td rowspan='2'><b>Vuosi</b></td>
<td><a href='lajittelun-maaritys.php?lajittelu=vn'><img src='images/nuoliylos.png' /></a></td>
</tr>
<tr>

<td><a href='lajittelun-maaritys.php?lajittelu=vl'><img src='images/nuolialas.png' /></a></td>
</tr>

</table></td><td>
<table><tr>
<td rowspan='2'><b>Näyttelijät</b></td>
<td><a href='lajittelun-maaritys.php?lajittelu=nn'><img src='images/nuoliylos.png' /></a></td>
</tr>
<tr>

<td><a href='lajittelun-maaritys.php?lajittelu=nl'><img src='images/nuolialas.png' /></a></td>
</tr>

</table>
</td><td>
<table><tr>
<td rowspan='2'><b>Ohjaaja</b></td>
<td><a href='lajittelun-maaritys.php?lajittelu=on'><img src='images/nuoliylos.png' /></a></td>
</tr>
<tr>

<td><a href='lajittelun-maaritys.php?lajittelu=ol'><img src='images/nuolialas.png' /></a></td>
</tr>

</table>

</td><td><table><tr>
<td rowspan='2'><b>Genre</b></td>
<td><a href='lajittelun-maaritys.php?lajittelu=gp'><img src='images/nuoliylos.png' /></a></td>
</tr>
<tr>

<td><a href='lajittelun-maaritys.php?lajittelu=gn'><img src='images/nuolialas.png' /></a></td>
</tr>

</table></td>



<td><table><tr>
<td rowspan='2'><b>Arviointi</b></td>
<td><a href='lajittelun-maaritys.php?lajittelu=arvp'><img src='images/nuoliylos.png' /></a></td>
</tr>
<tr>

<td><a href='lajittelun-maaritys.php?lajittelu=arvn'><img src='images/nuolialas.png' /></a></td>
</tr>

</table></td>

</tr>";

// Käydään rivejä niin kauan kuin niitä riittää
while ($rivi = mysql_fetch_array ($result)) {
   echo 
         "<tr><td width='18%'>{$rivi['enimi']}</td>" .
      	 "<td width='3%'>{$rivi['vuosi']}</td>" .
		 "<td width='45%'>{$rivi['nayttelijat']}</td>" .
		 "<td width='20%'>{$rivi['ohjaaja']}</td>" .
		 "<td width='10%'>{$rivi['genre']}</td>
		 <td width='5%'>{$rivi['arvostelu']} / 5</td>
		 </tr>";
} 

echo "</table>";

$sql = "SELECT COUNT(enimi) FROM elokuvat$_SESSION[search]"; 
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / $_SESSION['limited']); 

if(!isset($_GET['page'])) {
	$_GET['page'] = "";
}
if($_GET['page'] == "") {
 echo "<a style='color: #ff0000;' href='listaa.php?page=1'>1</a> "; 
 
 }
 
else if($_GET['page'] == "1") {
 echo "<a style='color: #ff0000;' href='listaa.php?page=1'>1</a> "; 
 
 }
 
 else {
				echo "<a href='listaa.php?page=1'>1</a> "; 
			}
 
for ($i=2; $i<=$total_pages; $i++) { 
            
			if($i == $_GET['page']) {
			echo "<a style='color: #ff0000;' href='listaa.php?page=".$i."'>".$i."</a> "; 

			}
			
			else {
				echo "<a href='listaa.php?page=".$i."'>".$i."</a> "; 
			}
};

echo "<br />";
echo "<br />";

if($_SESSION['searchi'] == "") {
}
else {
echo "<ul><li>Haku tuotti $hakurivitmaara osumaa!</li></ul>";
} 
echo "<ul><li>Elokuvia yhteensä $num_movies elokuvaa</li></ul>";

echo "<ul><li>Näkyvissä yhteensä $num_rows elokuvaa</li></ul>";
echo "<br />";
echo "<br />";

require_once('dbclose.php');

?>
                </div> <!-- contentcoretopin loppu -->
            </div> <!-- contentcoren loppu -->
        </div> <!-- contentin loppu -->
        <div id="footer">
        	<div id="footercore">
            
            </div> <!-- footercoren loppu -->
        </div> <!-- footerin loppu -->
    </div> <!-- containerin loppu -->
</body>
</html>
