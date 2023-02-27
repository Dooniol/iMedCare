<?php
	session_name('sn');
	require 'inc/config.php';
	require 'inc/session.php';
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
		$query1="SELECT codfiscale FROM utente WHERE username= '".$_SESSION['username']."'";
		$result = mysqli_query($conn,$query1);
		if($result==true){
						while($row=$result->fetch_assoc()){
							$user['codfiscale']=$row['codfiscale'];
						}
		}
		if (isset($_POST['addexam'])){				
					$query = "INSERT INTO esame_urine VALUES('"
					.$_POST['idesame']."','"
					.$_POST['data']."','"
					.$_POST['codfiscale']."','"
					.$_POST['aspetto']."','"
					.$_POST['colore']."','"
					.$_POST['pesospecifico']."','"
					.$_POST['reazione']."','"
					.$_POST['proteine']."','"
					.$_POST['glucosio']."','"
					.$_POST['emoglobina']."','"
					.$_POST['chetoni']."','"
					.$_POST['pigmenti']."','"
					.$_POST['nitriti']."','"
					.$_POST['urobilinogeno']."');";					
					$result = mysqli_query($conn,$query);						
					if($result==true){
						echo "Registrazione avvenuta con successo";
						header('Location:myprofile.php');
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
					<label> ID Esame </label>
					<input type="number" min="1" value="" name="idesame" class="form-control">
					<label> Data Esame </label>
					<input type="date" value="" name="data" class="form-control" required>
					<label> Codice Fiscale </label>
					<input type="text" value="<?php echo $user['codfiscale'] ?>" name="codfiscale" class="form-control" readonly>
					<label> Aspetto</label>
					<input type="text" value="" name="aspetto" class="form-control" required>
					<label> Colore </label>
					<input type="text" value="" name="colore" class="form-control" required>
					<label> Peso Specifico </label>
					<input type="double" value="" name="pesospecifico" class="form-control" required>
					<label> Reazione </label>
					<input type="text" value="" name="reazione" class="form-control" required>
				</div>
				<div class="col-sm-4" id="space1">
					<label> Proteine </label>
					<input type="double" value="" name="proteine" class="form-control" required>
					<label> Glucosio </label>
					<input type="double" value="" name="glucosio" class="form-control" required>
					<label> Emoglobina </label>
					<input type="double" value="" name="emoglobina" class="form-control" required>
					<label> Chetoni </label>
					<input type="double" value="" name="chetoni" class="form-control" required>
					<label> Pigmenti Biliari </label>
					<input type="double" value="" name="pigmenti" class="form-control" required>
					<label> Nitriti </label>
					<input type="double" value="" name="nitriti" class="form-control" required>
					<label> Urobilinogeno </label>
					<input type="double" value="" name="urobilinogeno" class="form-control" required><br>
					<button type="submit" name="addexam" style="color:black;" class="btn btn-info">AGGIUNGI ESAME</button>
					<a href="myprofile.php" id="link_reditect" style="margin-left:10px;">Annulla</a><br><br><br>
				</div>	
			</form>
		</center>