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
		if (isset($_POST['addexam'])){				
					$query = "INSERT INTO emocromocitometrico VALUES('"
					.$_POST['idesame']."','"
					.$_POST['data']."','"
					.$_POST['codfiscale']."','"
					.$_POST['globulirossi']."','"
					.$_POST['globulibianchi']."','"
					.$_POST['emoglobina']."','"
					.$_POST['ematocrito']."','"
					.$_POST['mcv']."','"
					.$_POST['mch']."','"
					.$_POST['mchc']."','"
					.$_POST['neutrofili']."','"
					.$_POST['eosinofili']."','"
					.$_POST['basofili']."','"
					.$_POST['linfociti']."','"
					.$_POST['monociti']."','"
					.$_POST['piastrine']."');";					
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
		$query1="SELECT codfiscale FROM utente WHERE username= '".$_SESSION['username']."'";
		$result = mysqli_query($conn,$query1);
		if($result==true){
						while($row=$result->fetch_assoc()){
							$user['codfiscale']=$row['codfiscale'];
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
					<label> Globuli Rossi</label>
					<input type="double" value="" name="globulirossi" class="form-control" required>
					<label> Globuli Bianchi </label>
					<input type="double" value="" name="globulibianchi" class="form-control" required>
					<label> Emoglobina </label>
					<input type="double" value="" name="emoglobina" class="form-control" required>
					<label> Valore Ematocrito </label>
					<input type="double" value="" name="ematocrito" class="form-control" required>
					<label> MCV </label>
					<input type="double" value="" name="mcv" class="form-control" required>
				</div>
				<div class="col-sm-4" id="space1">	
					<label> MCH </label>
					<input type="double" value="" name="mch" class="form-control" required>
					<label> MCHC </label>
					<input type="double" value="" name="mchc" class="form-control" required>
					<label> Neutrofili </label>
					<input type="double" value="" name="neutrofili" class="form-control" required>
					<label> Eosinofili </label>
					<input type="double" value="" name="eosinofili" class="form-control" required>
					<label> Basofili </label>
					<input type="double" value="" name="basofili" class="form-control" required>
					<label> Linfociti </label>
					<input type="double" value="" name="linfociti" class="form-control" required>
					<label> Monociti </label>
					<input type="double" value="" name="monociti" class="form-control" required>
					<label> Piastrine </label>
					<input type="double" value="" name="piastrine" class="form-control" required><br>
					<button type="submit" name="addexam" style="color:black;" class="btn btn-info">AGGIUNGI ESAME</button>
					<a href="myprofile.php" id="link_reditect" style="margin-left:10px;">Annulla</a><br><br><br>
				</div>	
			</form>
		</center>