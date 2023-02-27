<?php
	session_name('sn');
	require 'inc/session.php';
?>	
<!DOCTYPE html>

<head>

	<title> iMed-Care </title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<?php
		require 'inc/header.php';
		require 'inc/config.php';
	?>
	
</head>
<body id="bodyb">
	<center>
		<p>I Miei Upload</p>
	
	<?php
		$path = "'".$_SESSION['username']."'/";
		if ($handle = opendir($path)) {
			$files = array();
			while (false !== ($file = readdir($handle))) {
				if ($file != '.' && $file != '..') {
					$files.= $file;
					echo '<img alt="" src="',$path , $file , '">',"\n <br />";
				}
			}
			if ($files == null) {
				echo "Directory vuota!!<br />\n";
			}
		}
?>
	</center>
</body>
</html>