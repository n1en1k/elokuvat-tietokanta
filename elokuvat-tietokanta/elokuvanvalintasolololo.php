<?php
require_once("config.php");
require_once("dbopen.php");

$suoery = "SELECT * FROM elokuvat;";
$sdfsdf= mysql_query($suoery)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());


$num_rows = mysql_num_rows($sdfsdf);



$valitse = rand(0, $num_rows);

valitse($valitse);



require_once("dbclose.php");



function valitse($valitse) {
$query = "SELECT * FROM elokuvat WHERE id = '$valitse';";
$result= mysql_query($query)
    or die("Kyselyssä tapahtui virhe.: " . mysql_error());


$dfsdfsdfsdfsdfsdfsdf = mysql_num_rows($result);

	if($dfsdfsdfsdfsdfsdfsdf == 0) {
		valitse($valitse);
	}
		else {
				while ($rivi = mysql_fetch_array ($result)) {
				echo "{$rivi['enimi']}";
				
				
				}
		}

}
?>