<?php
session_start();


$_SESSION['laji'] = (isset($_GET['lajittelu']))   ?
                $_GET['lajittelu'] : '';


if($_SESSION['laji'] == "nn") {
	$_SESSION['laj'] = ' ORDER BY nayttelijat';
}

else if($_SESSION['laji'] == "nl") {
	$_SESSION['laj'] = ' ORDER BY nayttelijat DESC';
}

else if($_SESSION['laji'] == "vn") {
	$_SESSION['laj'] = ' ORDER BY vuosi';
}

else if($_SESSION['laji'] == "vl") {
	$_SESSION['laj'] = ' ORDER BY vuosi DESC';
}

else if($_SESSION['laji'] == "nvn") {
	$_SESSION['laj'] = ' ORDER BY nayttelijat, vuosi';
}


else if($_SESSION['laji'] == "nvl") {
	$_SESSION['laj'] = ' ORDER BY nayttelijat, vuosi DESC';
}

else if($_SESSION['laji'] == "en") {
	$_SESSION['laj'] = ' ORDER BY enimi';
}

else if($_SESSION['laji'] == "el") {
	$_SESSION['laj'] = ' ORDER BY enimi DESC';
}


else if($_SESSION['laji'] == "on") {
	$_SESSION['laj'] = ' ORDER BY ohjaaja';
}

else if($_SESSION['laji'] == "ol") {
	$_SESSION['laj'] = ' ORDER BY ohjaaja DESC';
}


else if($_SESSION['laji'] == "g") {
	$_SESSION['laj'] = ' ORDER BY genre';
}

else if($_SESSION['laji'] == "") {
   $_SESSION['laj'] = '';
}


header('location: listaa.php');

?>