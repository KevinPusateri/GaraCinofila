<html>
<head>
	<meta charset="utf-8">
	<title>Giudici</title>
	<link href="css/visualizza.css" rel="stylesheet">

</head>
	
<body>
<a href="home_Segretaria.php" class="indietro">&laquo; Indietro</a>

<img class="header__logo" src="images/logo_sito.png">

<table  align="center" >

	<tr>
		<td id="header" colspan="7"><h1>Gara - Cinofila</h1></td>
	</tr>
	<tr>
		<th>Codice Fiscale</th>
		<th>Codice Gara</th>
		<th>Nome</th>
		<th>Cognome</th>
	</tr>
<?php
	
	include("lib/lib_connection.php");
	
	$db = new Connection;
	
	$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	

	
		
		$sql="SELECT giudicegara.idGiudice,giudicegara.codGara,giudice.nome,giudice.cognome
				FROM giudicegara,giudice
				WHERE giudice.idGiudice=giudicegara.idGiudice";
		$result = $conn->query($sql);
	
	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
						
									echo "<tr>";
									echo "<td>".$row['idGiudice']."</td>";
									echo "<td>".$row['codGara']."</td>";
									echo "<td>".$row['nome']."</td>";
									echo "<td>".$row['cognome']."</td>";
									echo "</tr>";
									echo "</form>";
			}									
		}else{
					echo "<h2 style='text-align:center; color:white;' >Non ci sono giudici iscritti alle gare</h2>";
		}
		
		
	
		$conn->close();echo "</table>";
?>

</body>
</html>