<?php session_start();  ?>

<?php
// Jos käyttäjä ei ole kirjautunut, ohjataan kirjautumissisvulle: 
if (!isset($_SESSION['app5_islogged']) || $_SESSION['app5_islogged'] !== true) { 
echo "Sinulla ei ole oikeuksia talle sivulle!  <a href='login.php'>Tasta kirjautumaan:</a>";

exit; 
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
<head>
<title>Elokuvat - Uuden käyttäjän lisäys</title>
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
<li><a href='listaa.php'>Listaa</a></li>"; 
   echo "<li><a href='login.php'>Login</a></li>";
   echo "</ul>";
} else { // ja kirjautuneet uloskirjautumaan 
   echo "<ul>
<li><a href='index.php'>Etusivu</a></li>
<li><a href='logout.php'>Logout</a></li>"; 
   echo "<li><a href='listaa.php'>Listaa</a></li>";
   echo "<li><a href='lisaa-elokuva.php'>Lisää elokuva</a></li>";
   echo "<li><a href='muutettavan-tietueen-valinta.php'>Muuta tietueen kenttiä</a></li>";
   echo "<li><a href='poistettavan-tietueen-valinta.php'>poista tietue</a></li>";
   echo "<li class='current'><a href='uuden-kayttajan-lisays.php'>Lisää käyttäjä</a></li>";
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
              <h3>Elokuvat - Uuden käyttäjän lisäys</h3>
                </div> <!-- bannercorebottomin loppu -->
            </div> <!-- bannercoren loppu -->
        
        </div> <!-- bannerin loppu -->
    	<div id="content">
        	<div id="contentcore">
            	<div id="contentcoretop">
<h2 style="margin:0;">Käyttäjän lisäys</h2>
<br />
<?php



/*
lisayslomake.php
*/

?>
<form method="post" action="tallenna-uusi-kayttaja.php">

Syötä käyttäjän nimi: <br />
<input maxlength="16" type="text" name="uusiusername" /><br />
Syötä salasana: <br />
<input maxlength="64" type="password" name="uusiuserpasswd" /><br />
Syötä salasana uudelleen: <br />
<input maxlength="64" type="password" name="uusiuserpasswd2" /><br />
<br /><br />


<input type="submit" value="tallenna" name="Lisää" />

</form>



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

