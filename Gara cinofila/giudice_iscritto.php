<html>
<head>
	<meta charset="utf-8">
	<title>Registrazione Giudice</title>
	
	<link href="css/giudice.css" rel="stylesheet">
	<link href="css/visualizza.css" rel="stylesheet">

	
		<script>
		function avviso(){	
			alert("iscrizione completata");
		}
		
	</script>
</head>
	
<body>
<a href="iscrivi_giudice.php" class="indietro">&laquo; Indietro</a>
<img class="header__logo" src="images/logo_sito.png">



<?php
echo"
<table align='center' >
<tr>
		<td id='header' colspan='12'><h1>Gara - Cinofila</h1></td>
	</tr>

	<tr>
	<th>Codice Gara</th>
	<th>Codice Fiscale Giudice</th>
	<th>Nome</th>
	<th>Cognome</th>
	<th>Iscrizione</th>
	</tr>";


		include("lib/lib_connection.php");
	
	$db = new Connection;
	
	$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
		$idG=$_GET['msg'];
	
	
		$sql = "SELECT giudice.idGiudice,giudice.nome,giudice.cognome
		FROM giudice";
		$result = $conn->query($sql);
		
		
								
								
					
		$conn->query($sql);
		if ($result->num_rows > 0 ) {
			
						while($row = $result->fetch_assoc()){
							
							
								echo "<tr>";
								echo "<form action='iscritto.php?codG=$idG' method='post' onSubmit='return avviso()'>  ";
								echo "<td><input type='text' name='idGara' style='text-align:center; width:140px; height:30px;' readonly='readonly' value='$idG' /></td>";
								echo "<td><input type='text' name='idGiudice' style='text-align:center; width:140px; height:30px;' readonly='readonly' value='".$row['idGiudice']."'</td>";
								echo "<td><input type='text' name='nome' style='text-align:center; width:140px; height:30px;' readonly='readonly' value='".$row['nome']."'</td>";
								echo "<td><input type='text' name='cognome' style='text-align:center; width:140px; height:30px;' readonly='readonly' value='".$row['cognome']."'</td>";
								echo "<td><input type='submit' class='prenota' value='Iscrivi'></td>";
								echo "</form>";
								echo "</tr>";
								
								
									
						}
			
		}else{
				echo "<h2 style='text-align:center;' >Non ci sono Giudici</h2>";
		}$conn->close();
	?>	

	


</body>
</html>


