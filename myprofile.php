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
	<?php	
		$conn = mysqli_connect($host,$username,$password,$dbname);
		if(!$conn){
				echo "Errore in fase di connessione.";
				exit();
		}
		$sql="SELECT * FROM utente WHERE username = '".$_SESSION['username']."'";
		$result=mysqli_query($conn, $sql);
					//echo "$sql";
					if($result==true){
						while($row=$result->fetch_assoc()){
							$user['nome']=$row['Nome'];
							$user['cognome']=$row['Cognome'];
							$user['datanascita']=$row['Datanascita'];
							$user['comunenascita']=$row['comunenascita'];
							$user['comuneresidenza']=$row['comuneresidenza'];
							$user['cap']=$row['cap'];
							$user['email']=$row['email'];
							$user['codfiscale']=$row['codfiscale'];
							$user['indirizzo']=$row['indirizzo'];
							$user['telefono']=$row['telefono'];
							$user['grupposanguigno']=$row['grupposanguigno'];
							$user['sesso']=$row['sesso'];
							$user['username']=$row['username'];
							$user['password']=$row['password'];
							$user['relazione']=$row['relazione'];
						}
					}
	?>
	<center>
	<table class="table" style="margin-top:52px">
	<tr>
		<td>
			<div class="col-md-5">
				<label>Relazione Medico:</label><br>
				<a href="addmed.php" style="font-size:10px;">Modifica Relazione Medico</a><br>
				<label>Dati Personali:</label><br>
				<a href="modify_email.php" style="font-size:10px;">Modifica Indirizzo Email</a><br>
				<a href="modify_in.php" style="font-size:10px;">Modifica Indirizzo di Residenza</a><br>
				<a href="modify_tel.php" style="font-size:10px;">Modifica Numero di Telefono</a><br>
				<label>Registrazione Esami:</label><br>
				<a href="upload.php" style="font-size:10px;">Carica i tuoi Esami</a><br>
				<a href="emocromocitometrico.php" style="font-size:10px;">Aggiungi Esame Emocromocitometrico</a><br>
				<a href="urine.php" style="font-size:10px;">Aggiungi Esame Urine</a>
			</div>
		</td>
		<td>
			<div class="col-md-7">
				<label>Nome e Cognome: </label>
				<label style="margin-top:60px;"><?php echo $user['nome'] ?> </label>
				<label><?php echo $user['cognome'] ?></label><br>
				<label>Data di Nascita: </label>
				<label><?php echo $user['datanascita'] ?></label><br>
				<label>Comune di Nascita: </label>
				<label><?php echo $user['comunenascita'] ?></label><br>
				<label>Comune di Residenza: </label>
				<label><?php echo $user['comuneresidenza'] ?>,</label>
				<label><?php echo $user['cap'] ?></label><br>
				<label>E-mail: </label>
				<label><?php echo $user['email'] ?></label>   <br>
				<label>Codice Fiscale: </label>
				<label><?php echo $user['codfiscale'] ?></label><br>
				<label>Indirizzo: </label>
				<label><?php echo $user['indirizzo'] ?></label><br>    
				<label>Numero di Telefono: </label>
				<label><?php echo $user['telefono'] ?></label><br>
				<label>Gruppo Sanguigno: </label>
				<label><?php echo $user['grupposanguigno'] ?></label><br>
				<label>Sesso: </label>
				<label><?php echo $user['sesso'] ?></label><br>
				<label>Codice Relazione Medico: </label>
				<label><?php echo $user['relazione'] ?></label>
			</div>	
		</td>
	</tr>
	</table>
	</center>
	
</body>

</html>