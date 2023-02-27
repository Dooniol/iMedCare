<?php
	require 'inc/logout.php';
	setcookie("", "", 0, "/");
	header('Location: login.php');
?>

	