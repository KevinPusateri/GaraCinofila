<html>
<head>
	<meta charset="utf-8">
	<title>Registrazione Giudice</title>
	
	<link href="css/iscrivi_gara.css" rel="stylesheet">
		<link href="css/visualizza.css" rel="stylesheet">

	
		<script>
	
		function avviso(){
			
			
			alert("iscrizione completata");
		}
		
	</script>
</head>
	
<body>

<img class="header__logo2" src="images/logo_sito.png">
<a href="home_segretaria.php" class="indietro">&laquo; Indietro</a>

		
		<div class="loginBox">
		
			<img  class="user" src="images/gara.jpg">

			<h3>Gara</h3>
		
			<form action="" method="post" onsubmit="return avviso();">
			
			<div class="inputBox">
					<input type="text" name="codCateg" maxlength="4" placeholder="Codice categoria" required>
				</div>
			
			<div class="inputBox">
					<input type="text" name="codGara" maxlength="4" placeholder="Codice gara" required>
				</div>
			
			
			<div class="inputBox">
					<input type="text" name="codRazza" maxlength="4" placeholder="Codice razza" required>
				</div>
				
				<div class="inputBox">
					<input type="text" name="categoria" maxlength="15" placeholder="Categoria gara" required>
				</div>
			
			<div class="inputBox">
					<input type="text" name="razza" maxlength="16" placeholder="Razza" required>
				</div>
				

				<div class="inputBox">
					<input type="number" step='0.01' name="peso" placeholder="Peso" required>
				</div>
				
				<div class="inputBox">
					<input type='number' step='0.01' name="altG" placeholder="Altezza Garrese" required>
				</div>
				
				<div class="inputBox">
					<input type='number' step='0.01' name="altC" placeholder="Altezza Coscia" required>
				</div>
			
				Data
				<div class="inputBox">
					<input type="date" name="data" placeholder="Data" required>
				</div>	
					<input type="submit" name="submit" value="Registra">
			</form> 
			
		</div>
		
		
</body>
<?php

	
	include("lib/lib_connection.php");
	
	$db = new Connection;
	
	if(isset($_POST['submit'])){
		
		$codCateg=$_POST['codCateg'];
		$codGara=$_POST['codGara'];
		$codRazza=$_POST['codRazza'];
		$categoria=$_POST['categoria'];
		$razza=$_POST['razza'];
		$peso=$_POST['peso'];
		$altG=$_POST['altG'];
		$altC=$_POST['altC'];
		$data=$_POST['data'];

	$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
		
		$sql1= "INSERT INTO categoria(codCateg, categGara) VALUES('$codCateg','$categoria')";
		$conn->query($sql1);
		
		
		$sql2= "INSERT INTO razza(codRazza,codCateg,nomeRazza,raPeso,raAltGarrese,raAltCoscia) VALUES('$codRazza','$codCateg','$razza','$peso','$altG','$altC')";
		$conn->query($sql2);
		
		$sql3="INSERT INTO gara(codGara,codCateg,data) VALUES('$codGara','$codCateg','$data')";
		$result=$conn->query($sql3);
	
		
		
		
	
	
		
		$conn->close();
	
		
	}
	

?>
</html>


