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

<body id="bodyb">
		<div class="col-md-12" style="margin-top:40px;">
			<?php
				if(isset($_POST["submit"])){
					
					$target_dir = "'".$_SESSION['username']."'/";
					if(!file_exists($target_dir)){
						mkdir($target_dir);
					}	

					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);					
					
					//primo metodo per ricavare l'estensione del file
					$split = explode("/", $_FILES["fileToUpload"]["type"]);
					$filetype = $split[1];
					//secondo metodo per ricavare l'estensione del file
					$filetype2 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));						
					
					$uploadOk = true;
						if($filetype2 != "jpg" && $filetype2 != "png" && $filetype2 != "jpeg" && $filetype2 != "gif"){
							echo '<h1>Puoi caricare solo file JPG, JPEG, PNG, GIF.</h1>';
							$uploadOk = false;
						}
						
					if($uploadOk){
						
						$cont = 0;
						if (file_exists($target_file)) {
							$flag = 1;
							while($flag){
								$cont++;
								$split = explode(".", $_FILES["fileToUpload"]["name"]);
								$new_name = $split[0]. "(". $cont . ").".$split[1];
								$target_file = $target_dir . $new_name;
								if(file_exists($target_file)){
									$flag = 1;
								}else{
									$flag = 0;
								}
							}
						}
						
						$result = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
						if($result){
							echo '<h1>Il file "'.$_FILES["fileToUpload"]["name"].'" &egrave stato caricato correttamente.</h1>';
							echo '<p> Dimensione file: '.$_FILES["fileToUpload"]["size"] .' byte</p>';
							echo '<p> Tipo file: '.$_FILES["fileToUpload"]["type"] .'</p>';	
							echo '<p> Estensione file: '.$filetype.'</p>';
							// o echo '<p> Estensione file: '.$filetype2.'</p>';
						}else{
							echo "Errore nel caricamento del file. Riprovare.";
						}
					}
				}else{
			?>
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<h1>Seleziona un file da caricare:</h1>
				<br/>
				<input type="file" name="fileToUpload" id="fileToUpload"><br>
				<input type="submit" value="Carica file" name="submit">
			</form>
			<?php
				}
			?>
		</article>
	</div>	
</body>

</html>