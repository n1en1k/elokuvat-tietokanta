<?php
session_start();

$rivimaara = (isset($_GET['m']))   ?
                $_GET['m'] : '100500';

$_SESSION['limitt'] = (isset($_GET['limitti']))   ?
                $_GET['limitti'] : 20;


if($_SESSION['limitt'] == 25) {
$_SESSION['limited'] = 25;
}

else if($_SESSION['limitt'] == 50) {
$_SESSION['limited'] = 50;
}

else if($_SESSION['limitt'] == 100) {
$_SESSION['limited'] = 100;
}

else if($_SESSION['limitt'] == 20) {
$_SESSION['limited'] = 20;
}







else if($_SESSION['limitt'] == "kaikki") {
$_SESSION['limited'] = $rivimaara;
}



header('location: listaa.php');

?>