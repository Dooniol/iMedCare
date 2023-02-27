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
		$sql="SELECT telefono FROM utente WHERE username = '".$_SESSION['username']."'";
		$result=mysqli_query($conn, $sql);
					//echo "$sql";
					if($result==true){
						while($row=$result->fetch_assoc()){
							$user['telefono']=$row['telefono'];
						}
					}
		if (isset($_POST['update'])){				
					$query = "UPDATE utente SET telefono= '".$_POST['telefono']."' WHERE username='".$_SESSION['username']."'";					
					$result = mysqli_query($conn,$query);						
					if($result==true){
						if($result==true){
						?>
						<div class="alert alert-danger">
							<strong>Successo!</strong> Modifica effettuata.
						</div>
			<?php
						}
						header('Location:myprofile.php');
					}else{
			?>
						<div class="alert alert-danger">
							<strong>Errore!</strong> Modifica non effettuata.
						</div>
			<?php
					}
				}				
			?>
		<center>	
		<form method="post" action="" class="form" style="margin-top:60px;">
			<label> Numero di Telefono </label>
			<input type="text" value="<?php echo $user['telefono'] ?>" name="telefonop" class="form-control" readonly>
			<label> Nuovo Numero di Telefono </label>
			<input type="text" value="" name="telefono" class="form-control"><br>
			<button type="submit" name="update" style="color:black;" class="btn btn-info">Modifica</button>
		</form>
		</center>
</body>

</html>