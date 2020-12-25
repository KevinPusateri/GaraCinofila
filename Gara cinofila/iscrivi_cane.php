<html>
<head>
	<meta charset="utf-8">
	<title>Registrazione Giudice</title>
	
	<link href="css/iscrivi_cane.css" rel="stylesheet">
	<link href="css/visualizza.css" rel="stylesheet">

	
		<script>
	
		function avviso(){
			
			
			alert("iscrizione completata");
		}
		
	</script>
</head>
	
<body>

<img class="header__logo2" src="images/logo_sito.png">
<a href="eventi.php" class="indietro">&laquo; Indietro</a>

		
		<div class="loginBox">
<img  class="user" src="images/dog.jpg">
		
			
			<h3>Candidato</h3>
		
			<form action="" method="post" onsubmit="return avviso();">
			
			<div class="inputBox">
					<input type="text" name="numeroChip" maxlength="15" placeholder="Numero microchip" required>
				</div>			
				
				<div class="inputBox">
					<input type="text" name="nome" placeholder="Nome" required>
				</div>
				Data di nascita
				<div class="inputBox">
					<input type="date" name="data" placeholder="Data di nascita" required>
				</div>
				
			
				<div class="inputBox">
					<input type="number" step="0.01" name="peso" placeholder="Peso" required>
				</div>
				
				<div class="inputBox">
					<input type="number" step="0.01" name="altGarrese" placeholder="Altezza garrese" required>
				</div>
				
				<div class="inputBox">
					<input type="number" step="0.01" name="altCoscia" placeholder="Altezza coscia" required>
				</div>
				
					<input type="submit" name="submit" value="Registra">

					<?php 
					$idG=$_GET['msg'];
					$idR=$_GET['ms'];
					echo "
					 <input type='hidden' name='c' value='$idG'/>
					 <input type='hidden' name='r' value='$idR'/>
			</form> 
			
		</div>
	
		
</body>";

	
	include("lib/lib_connection.php");
	
	$db = new Connection;
	
	if(isset($_POST['submit'])){
		$numChip=$_POST['numeroChip'];
		$nome=$_POST['nome'];
		$data=$_POST['data'];
		$peso=$_POST['peso'];
		$altG=$_POST['altGarrese'];
		$altC=$_POST['altCoscia'];
		$idGara=$_POST['c'];
		$idRazza=$_POST['r'];

		
	
		$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
				session_start();
					
					$user=$_SESSION['username'];
					$sql = "SELECT codFiscale FROM proprietario WHERE username='$user'" ;
					$result = $conn->query($sql);
					
					
					
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
										
									$k=$row['codFiscale'];
								
							}
						}else{
									echo "<h2 style='text-align:center; color:white;'>errore</h2>";
						}
	
		$sql1= "INSERT INTO cane(numeroChip, codProprietario,codRazza,nome,dataNasc,peso,altGarrese,altCoscia) 
		VALUES('$numChip','$k','$idRazza','$nome','$data','$peso','$altG','$altC')";
		$conn->query($sql1);
		

		
		
	$sql2= "INSERT INTO candidato(numeroChip, codGara) 
		VALUES('$numChip','$idGara')";
		$conn->query($sql2);
	
		$conn->close();
	
		
	}
	

?>
</html>


