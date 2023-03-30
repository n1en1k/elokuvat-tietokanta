<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<h2>Arvo elokuva</h2>
<form action="rand-movie.php" method="post">

<input type="submit" value="arvo" name="nappi" />
</form>

<?php
if(!isset($_POST['nappi'])) {echo "</body></html>"; exit(); }

$tulos = rand(0,4);

if($tulos == 0) {
 echo "<h3>koston liekki</h3>";
}


else if($tulos == 1) {
 echo "<h3>titanic</h3>";
}


else if($tulos == 2) {
 echo "<h3>mafiaveljet</h3>";
}

else if($tulos == 3) {
 echo "<h3>running man</h3>";
}

else if($tulos == 4) {
 echo "<h3>unelmien naapuri</h3>";
}






?>
</body>
</html>
