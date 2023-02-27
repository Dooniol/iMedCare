<?php
	$username = $_SESSION['username'];
	$cookie_name = $_SESSION['username'];
	$cookie_value = $username;
	$scadenza = time() + (3600); //un giorno in secondi = 86400
	setcookie($cookie_name, $cookie_value, $scadenza, "/");
?>