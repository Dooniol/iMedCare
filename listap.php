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
	<center style="margin-top:70px;">
	<?php
	$conn = mysqli_connect($host,$username,$password,$dbname);
	if(!$conn){
			echo "Errore in fase di connessione.";
			exit();
	}
	$sql="SELECT cod_relazione FROM medico WHERE username = '".$_SESSION['username']."'";
	$result=mysqli_query($conn, $sql);
	if($result==true){
		while($row=$result->fetch_assoc()){
			$med['cod_relazione']=$row['cod_relazione'];
		}
	}
	?>
		<table class="table">
									<tr>
										<th id="table">Cognome</th>
										<th id="table">Nome</th>
										<th id="table">Comune Residenza</th>
										<th id="table">C.FISCALE</th>
										<th id="table">Username</th>
									</tr>
						<?php
									$sql = "SELECT cognome, nome, comuneresidenza, codfiscale, username FROM utente WHERE relazione= '".$med['cod_relazione']."'";
									$result = mysqli_query($conn, $sql);	
									$i = 1;
									while($row = $result->fetch_assoc()){
										echo "<tr>";
										foreach($row as $key => $value){
											echo "<td id='table'>".$value."</td>"; 
										}
										$i++;
										echo"<td id='table'> <a href='dettaglioesami.php?username=$value'>Dettaglio</a>";
										echo"</tr>";
									}
									$result->data_seek(0);
									
									echo '</table>';
								?>
	</center>
	
</body>

</html>