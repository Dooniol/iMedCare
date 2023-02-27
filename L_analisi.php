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
	?>
</head>

<body id="bodyb"
	<div class="col-sm-6" id="tab1">
		<table class="table">
			<tr>
				<th id="table">Tipologia</th>
				<th id="table">Data Esame</th>
				<th id="table">Dettagli</th>
			</tr>
			<?php
				require 'inc/config.php';	
				$conn = mysqli_connect($host, $username, $password, $dbname);
				if(!$conn){
					echo "Errore in fase di connessione";
					exit();
				}
				$sql = "SELECT tipologia, data, codfiscale FROM esame, utente WHERE esame.codfiscale=utente.codfiscale AND utente.username= '".$_SESSION['username']."'";
				$result = mysqli_query($conn, $sql);					
				$i = 1;
				while($row = $result->fetch_assoc()){
					echo "<tr>";
					foreach($row as $key => $value){
							echo "<td id='table'>".$value."</td>"; 
					}
					$i++;
					echo"<td id='table'> <a href='DUtenti.php?username=$value'>Dettaglio</a>";
					echo"</tr>";
				}
				$result->data_seek(0);			
				echo '</table>';
			?>			
	</div>
</body>

</html>