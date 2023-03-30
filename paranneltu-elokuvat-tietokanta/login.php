<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login</title>
<link href="tyyli.css" rel="stylesheet" type="text/css" />

</head>

<body>



<?php
$errmsg = ''; 
if (isset($_POST['tunnus']) AND isset($_POST['pass'])) { 
    // Kovakoodatut tunnus ja salasana 
    if ($_POST['tunnus'] === '100' AND $_POST['pass'] === '500') { 
        // Kirjautuminen ok, merkintä sessiotauluun 
        $_SESSION['app6_islogged'] = true; 
        $_SESSION['tunnus'] = $_POST['tunnus']; // Tässä mukavuussyistä, voidaan tulostella yms. 
echo "<a href='listaa.php'>Listaa</a>";
        exit; 
    } else { 
        $errmsg = '<span style="background: yellow;">Tunnus/Salasana väärin!</span>'; 
    } 
} 
?> 



<?php 
if ($errmsg != '') echo $errmsg; 
?> 
<h3>Kirjaudu sisään päästäksesi rajoitetulle alueelle!</h3>
<form method="post" action="login.php" 
style=color:#000;background-color:#eeeeee> 
Tunnus:<br><input type="text" name="tunnus" size="30"><br> 
Salasana:<br><input type="password" name="pass" size="30"><br> 
<input type='submit' name='action' value='Kirjaudu'> 

</form>

</body>
</html>