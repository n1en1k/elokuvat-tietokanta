<?php session_start();  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
<head>
<title>Elokuvat - Login</title>
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
   echo "<li class='current'><a href='login.php'>Login</a></li>";
   echo "</ul>";
} else { // ja kirjautuneet uloskirjautumaan 
   echo "<ul>
<li><a href='index.php'>Etusivu</a></li>
<li><a href='logout.php'>Logout</a></li>"; 
   echo "<li><a href='listaa.php'>Listaa</a></li>";
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
$errmsg = ''; 
if (isset($_POST['uid']) AND isset($_POST['passwd'])) { 
   include ('config.php'); 
   include ('dbopen.php'); 

   $uid = mysql_real_escape_string($_POST['uid']); 
   $passwd = mysql_real_escape_string($_POST['passwd']); 

   $sql = "SELECT uid, password 
            FROM users 
            WHERE uid = '$uid' AND password = PASSWORD('$passwd')"; 
     
    $result = mysql_query($sql) or die('Kysely epäonnistui. ' . mysql_error());  
     
    if (mysql_num_rows($result) == 1) { 

        $_SESSION['app5_islogged'] = true; 
        $_SESSION['uid'] = $_POST['uid']; 
         echo "<a href='listaa.php'>Nyt olet kirjautunut! TÄSTÄ LISTAUKSEEN!</a>"; 
        exit; 
    } else { 
        $errmsg = '<span style="background: yellow;">Tunnus/Salasana vaarin!</span>'; 
    } 
    include ('dbclose.php'); 
} 
?> 

<title>Kirjautusmislomake</title> 

<?php 
if ($errmsg != '')echo $errmsg; 
?> 

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
Tunnus:<br><input type="text" name="uid" size="30"><br> 
Salasana:<br><input type="password" name="passwd" size="30"><br> 
<input type='submit' name='action' value='Kirjaudu'> 
<br> 
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
