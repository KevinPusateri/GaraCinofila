<html>
<head>
	<meta charset="utf-8">
	<title>Gare</title>
	<link href="css/visualizza.css" rel="stylesheet">

</head>
	
<body>
<a href="home_Segretaria.php" class="indietro">&laquo; Indietro</a>

<img class="header__logo" src="images/logo_sito.png">

<table  align="center" >

	<tr>
		<td id="header" colspan="6"><h1>Gara - Cinofila</h1></td>
	</tr>
	<tr>
		<th>Numero microchip</th>
		<th>Codice gara</th>
		<th>categoria</th>
		<th>Voto</th>
		<th>Commento</th>
		<th>Media</th>

	</tr>
<?php
	
	include("lib/lib_connection.php");
	
	$db = new Connection;
	
	$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	

	
		
		$sql="SELECT votazioni.numeroChip,votazioni.codGara,categoria.categGara,votazioni.voto,votazioni.commento
				FROM votazioni,gara,categoria,candidato
				WHERE votazioni.codGara=candidato.codGara
				AND votazioni.codGara=gara.codGara
				AND gara.codCateg=categoria.codCateg";
		$result = $conn->query($sql);
	
	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
						
									echo "<tr>";
									echo "<td>".$row['numeroChip']."</td>";
									echo "<td>".$row['codGara']."</td>";
									echo "<td>".$row['categGara']."</td>";
									echo "<td>".$row['voto']."</td>";
									echo "<td>".$row['commento']."</td>";
									echo "</tr>";
			}									
		}else{
					echo "<h2 style='text-align:center; color:white;' >Non ci sono votazioni</h2>";
		}
		
			echo "<td>casfas</td>";

	
		$conn->close();echo "</table>";
?>

</body>
</html>