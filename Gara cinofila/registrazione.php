<html>
<head>
	<meta charset="utf-8">
	<title>Registrazione</title>
	
	<link href="css/registrazione.css" rel="stylesheet">
	<link href="css/visualizza.css" rel="stylesheet">

	
	<script>
	
		function avviso(){
			
			
			alert("registrazione completata");
		}
		
	</script>
</head>
	
<body>

<img class="header__logo2" src="images/logo_sito.png">
<a href="index.html" class="indietro">&laquo; Indietro</a>

		<div class="loginBox">
		
<form  action="" method="post" onsubmit="return avviso();">

	<img  class="user" src="images/user.png">
		
			
			<h3>Proprietario</h3>
			
			<div class="inputBox">
					<input type="text" name="codF" maxlength="16" placeholder="Codice Fiscale" required>
				</div>
				
				<div class="inputBox">
					<input type="text" name="username" maxlength="30" placeholder="Username" required>
				</div>
				
				<div class="inputBox">
					<input type="text" name="nome" maxlength="30" placeholder="Nome" required>
				</div>
				
				<div class="inputBox">
					<input type="text" name="cognome" maxlength="30" placeholder="Cognome" required>
				</div>
				
				<div class="inputBox">
					<input type="text" name="telefono" maxlength="10" placeholder="Telefono" required>
				</div>
				
				<div class="inputBox">
					<input type="password" name="password" maxlength="30" placeholder="Password" required>
				</div>
			
				
					<input type="submit" name="submit" value="Registrati">
			</form> 
			
			
</div>

	
</body>


<?php

	
	include("lib/lib_connection.php");
	
	$db = new Connection;
	
	if(isset($_POST['submit'])){
		$codF=$_POST['codF'];
		$username=$_POST['username'];
		$nome=$_POST['nome'];
		$cognome=$_POST['cognome'];
		$telefono=$_POST['telefono'];
		$pass=$_POST['password'];
		$num=3;
	$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
		
	
		
		
		$sql1= "INSERT INTO credenziali(username, password,tipoaccount) VALUES('$username','$pass','$num')";
		$conn->query($sql1);
		
		$sql2= "INSERT INTO proprietario(codFiscale, username, nome, cognome,telefono) VALUES('$codF','$username','$nome','$cognome','$telefono')";
			$conn->query($sql2);
		
		
	
	
		
		$conn->close();
	
		
	}
	

?>
</html>