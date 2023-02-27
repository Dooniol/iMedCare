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
		require 'inc/header_m.php';
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
		$sql="SELECT * FROM medico WHERE username = '".$_SESSION['username']."'";
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
							$user['indirizzo_studio']=$row['indirizzo_studio'];
							$user['recapito_tel']=$row['recapito_tel'];
							$user['specializzazione']=$row['specializzazione'];
							$user['sesso']=$row['sesso'];
							$user['username']=$row['username'];
							$user['password']=$row['password'];
							$user['cod_relazione']=$row['cod_relazione'];
							
						}
					}
	?>
	<center>
	<table class="table" style="">
	<tr>
		<td>
			<div class="col-md-5">
					<label>Relazioni Pazienti:</label><br>
					<a href="listap.php" style="font-size:10px;">Lista Pazienti</a><br>
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
				<label><?php echo $user['email'] ?></label>   <a href="modify_email.php" style="font-size:10px;">Modifica</a><br>
				<label>Codice Fiscale: </label>
				<label><?php echo $user['codfiscale'] ?></label><br>
				<label>Indirizzo: </label>
				<label><?php echo $user['indirizzo_studio'] ?></label>    <a href="modify_in.php" style="font-size:10px;">Modifica</a><br>
				<label>Numero di Telefono: </label>
				<label><?php echo $user['recapito_tel'] ?></label>     <a href="modify_tel.php" style="font-size:10px;">Modifica</a><br>
				<label>Specializzazione: </label>
				<label><?php echo $user['specializzazione'] ?></label><br>
				<label>Sesso: </label>
				<label><?php echo $user['sesso'] ?></label><br>
				<label>Codice Relazione Medico: </label>
				<label><?php echo $user['cod_relazione'] ?></label><br>
			</div>	
		</td>
	</tr>
	</table>
	</center>
	
</body>

</html>