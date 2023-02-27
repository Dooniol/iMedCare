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
	?>	
	<?php
	if(isset($_POST['login'])){
					$sql = "SELECT username, password FROM utente WHERE username = '".$_POST['username']."'";
					$result=mysqli_query($conn, $sql);
					//echo "$sql";
					if($result==true){
						while($row=$result->fetch_assoc()){
							$usernamea=$row['username'];
							$passworda=$row['password'];
						}
						//echo $usernamea['username'];
						//echo $passworda['password'];
						if(($usernamea == $_POST['username']) && ($passworda == $_POST['password'])){
							echo 'Login Effettuato.'; 
							$_SESSION['logged'] = true;
							$_SESSION['username'] = $_POST['username'];
							header('Location: homepage.php');
						}else{
							echo 'Errore durante il Login.';
						}
				}
				$conn->close();
			}
			    ?>
			<?php
	if(isset($_POST['loginm'])){
					$sql = "SELECT username, password FROM medico WHERE username = '".$_POST['username']."'";
					$result=mysqli_query($conn, $sql);
					//echo "$sql";
					if($result==true){
						while($row=$result->fetch_assoc()){
							$usernamea=$row['username'];
							$passworda=$row['password'];
						}
						//echo $usernamea['username'];
						//echo $passworda['password'];
						if(($usernamea == $_POST['username']) && ($passworda == $_POST['password'])){
							echo 'Login Effettuato.';
							$_SESSION['logged'] = true;
							$_SESSION['username'] = $_POST['username'];
							header('Location: homepagem.php');
						}else{
							echo 'Errore durante il Login.';
						}
				}
				$conn->close();
			}
			    ?>	
			<center>
			<div id="index_style">
				<form method="post" action="" class="form" id="form_inserimento">
					<label>Username </label>
					<input type="text" value="" name="username" class="form-control">
					<label>Password </label>
					<input type="password" value="" name="password" class="form-control">
					<br><br>
					<button type="submit" name="login" id="button_login" style="background-color:#80d4ff" class="btn-primary-md">Accedi come privato</button>
					<button type="submit" name="loginm" id="button_login" style="background-color:#1aff1a" class="btn-primary-md">Accedi come medico</button><br><br>
					<a href="register.php" id="link_redirect">Nuovo Utente Privato? Registrati qui!</a><br>
					<a href="register_m.php" id="link_redirect" >Nuovo Utente Medico? Registrati qui!</a>
				</form>
			</div>	
			</center>