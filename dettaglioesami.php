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
<body  id="bodyb">
	<style>
		margin-top:5%;
	</style>	
	<?php
		$user=$_GET['username'];
		$conn = mysqli_connect($host,$username,$password,$dbname);
	if(!$conn){
			echo "Errore in fase di connessione.";
			exit();
	}
	$sql="SELECT codfiscale FROM utente WHERE username = '$user'";
	$result=mysqli_query($conn, $sql);
	if($result==true){
		while($row=$result->fetch_assoc()){
			$cod['codfiscale']=$row['codfiscale'];
		}
	}
	?>
	<h3 style="margin-top:5%">Esami Emocromocitometrico</h3>
	<table class="table">
									<tr>
										<th id="table">ID</th>
										<th id="table">Data</th>
										<th id="table">C.FISCALE</th>
										<th id="table">Globuli R.</th>
										<th id="table">Globuli B.</th>
										<th id="table">Emoglobina</th>
										<th id="table">V.Ematocrito</th>
										<th id="table">MCV</th>
										<th id="table">MCH</th>
										<th id="table">MCHC</th>
										<th id="table">Neutrofili</th>
										<th id="table">Eosinofili</th>
										<th id="table">Basofili</th>
										<th id="table">Linfociti</th>
										<th id="table">Monociti</th>
										<th id="table">Piastrine</th>
									</tr>
						<?php
									$sql = "SELECT * FROM emocromocitometrico WHERE codfiscale = '".$cod['codfiscale']."'";
									$result = mysqli_query($conn, $sql);	
									$i = 1;
									while($row = $result->fetch_assoc()){
										echo "<tr>";
										foreach($row as $key => $value){
											echo "<td id='table'>".$value."</td>"; 
										}
										$i++;
										echo"</tr>";
									}
									$result->data_seek(0);
									
									echo '</table>';
						?>
	<h3>Esami Urine</h3>					
	<table class="table">
									<tr>
										<th id="table">ID</th>
										<th id="table">Data</th>
										<th id="table">C.FISCALE</th>
										<th id="table">Aspetto</th>
										<th id="table">Colore</th>
										<th id="table">Peso Specifico</th>
										<th id="table">Reazione</th>
										<th id="table">Proteine</th>
										<th id="table">Glucosio</th>
										<th id="table">Emoglobina</th>
										<th id="table">Chetoni</th>
										<th id="table">P.Biliari</th>
										<th id="table">Nitriti</th>
										<th id="table">Urobilinogeno</th>
									</tr>
						<?php
									$sql = "SELECT * FROM esame_urine WHERE codfiscale='".$cod['codfiscale']."'";
									$result = mysqli_query($conn, $sql);	
									$i = 1;
									while($row = $result->fetch_assoc()){
										echo "<tr>";
										foreach($row as $key => $value){
											echo "<td id='table'>".$value."</td>"; 
										}
										$i++;
										echo"</tr>";
									}
									$result->data_seek(0);
									
									echo '</table>';
								?>
	<center>							
	<?php
		$path = "'$user'/";
		if ($handle = opendir($path)) {
			$files = array();
			while (false !== ($file = readdir($handle))) {
				if ($file != '.' && $file != '..') {
					$files.= $file;
					echo '<img alt="" src="',$path , $file , '">',"\n <br />";
				}
			}
			if ($files == null) {
				echo "Directory vuota o inesistente!!<br />\n";
			}
		}
?>
	</center>
	</body>
</html>