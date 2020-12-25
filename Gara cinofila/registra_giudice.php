<html>
<head>
	<meta charset="utf-8">
	<title>Registrazione Giudice</title>
	
	<link href="css/iscrizione_giudice.css" rel="stylesheet">
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
<img  class="user" src="images/giudice.png">		
			
			<h3>Giudice</h3>
		
			<form action="" method="post" onsubmit="return avviso();">
			
			<div class="inputBox">
					<input type="text" name="codf" maxlength="16" placeholder="Codice Fiscale" required>
				</div>
				
				<div class="inputBox">
					<input type="text" name="username" placeholder="Username" required>
				</div>
				
				<div class="inputBox">
					<input type="text" name="nome" placeholder="Nome" required>
				</div>
				
				<div class="inputBox">
					<input type="text" name="cognome" placeholder="Cognome" required>
				</div>
				
				<div class="inputBox">
					<input type="password" name="password" placeholder="Password" required>
				</div>
			
				
					<input type="submit" name="submit" value="Registra">
			</form> 
			
		</div>
		
		
</body>
<?php

	
	include("lib/lib_connection.php");
	
	$db = new Connection;
	
	if(isset($_POST['submit'])){
		$codF=$_POST['codf'];
		$username=$_POST['username'];
		$nome=$_POST['nome'];
		$cognome=$_POST['cognome'];
		$pass=$_POST['password'];
		$num=2;
	$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
		
	
		
		
		$sql1= "INSERT INTO credenziali(username, password,tipoaccount) VALUES('$username','$pass','$num')";
		$conn->query($sql1);
		
		$sql2= "INSERT INTO giudice(idGiudice, username, nome, cognome) VALUES('$codF','$username','$nome','$cognome')";
			$conn->query($sql2);
		

		
	
	
		
		$conn->close();
	
		
	}
	

?>
</html>


