<?php
	session_name('sn');
	session_start();
	require 'inc/config.php';
?>	
<!DOCTYPE html>

<head>

	<title> iMed-Care </title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">

</head>
<body id="bodyb">
	<?php	
		$conn = mysqli_connect($host,$username,$password,$dbname);
		if(!$conn){
				echo "Errore in fase di connessione.";
				exit();
		}
		if (isset($_POST['register'])){
					$relazione=null;
					$query = "INSERT INTO utente VALUES('"
					.$_POST['nome']."','"
					.$_POST['cognome']."','"
					.$_POST['datanascita']."','"
					.$_POST['comunenascita']."','"
					.$_POST['comuneresidenza']."','"
					.$_POST['cap']."','"
					.$_POST['email']."','"
					.$_POST['codfiscale']."','"
					.$_POST['indirizzo']."','"
					.$_POST['telefono']."','"
					.$_POST['sangue']."','"
					.$_POST['sesso']."','"
					.$_POST['username']."','"
					.$_POST['password']."','"
					.$_POST['relazione']."');";					
					$result = mysqli_query($conn,$query);						
					if($result==true){
						echo "Registrazione avvenuta con successo";
						header('Location:index.php');
					}else{
			?>
						<div class="alert alert-danger">
							<strong>Errore!</strong> Registrazione non effettuata.
						</div>
			<?php
					}
				}				
			?>
		<center>
			<form method="post" action="" class="form">
				<div class="col-sm-4" id="space">
					<label> Nome </label>
					<input type="text" value="" name="nome" class="form-control" required>
					<label> Data di Nascita </label>
					<input type="date" value="" name="datanascita" class="form-control" required>
					<label> Comune di Nascita </label>
					<input type="text" value="" name="comunenascita" class="form-control" required>
					<label> Comune di Residenza</label>
					<input type="text" value="" name="comuneresidenza" class="form-control" required>
					<label> CAP </label>
					<input type="text" value="" name="cap" class="form-control">
					<label>E-Mail </label>
					<input type="email" value="" name="email" class="form-control" required>
					<label> Username </label>
					<input type="text" value="" name="username" class="form-control" required>
				</div>
				<div class="col-sm-4" id="space1">
					<label> Cognome </label>
					<input type="text" value="" name="cognome" class="form-control" required>
					<label> Codice Fiscale </label>
					<input type="text" value="" name="codfiscale" class="form-control" required>
					<label> Indirizzo </label>
					<input type="text" value="" name="indirizzo" class="form-control">
					<label> Telefono </label>
					<input type="tel" value="" name="telefono" class="form-control">
					<label> Gruppo Sanguigno </label>
					<input type="text" value="" name="sangue" class="form-control">
					<label> Password </label>
					<input type="password" value="" name="password" class="form-control" required><br>
					<label> Sesso: </label>
					<input type="radio" name="sesso" value="uomo" checked> Uomo
					<input type="radio" name="sesso" value="donna"> Donna<br><br>
					<button type="submit" name="register" style="color:black;" class="btn btn-info">REGISTRATI</button><br><br> 
				</div>
			</form>
		</center>