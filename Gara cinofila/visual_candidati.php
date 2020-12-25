<html>
<head>
	<meta charset="utf-8">
	<title>Candidati</title>
	<link href="css/visualizza.css" rel="stylesheet">

</head>
	
<body>
<a href="home_Segretaria.php" class="indietro">&laquo; Indietro</a>

<img class="header__logo" src="images/logo_sito.png">

<table  align="center" >

	<tr>
		<td id="header" colspan="5"><h1>Gara - Cinofila</h1></td>
	</tr>
	<tr>
		<th>Codice Gara</th>
		<th>Numero microChip</th>
		<th>Categoria</th>
		<th>Proprietario</th>
		<th>Razza</th>
	</tr>
<?php
	
	include("lib/lib_connection.php");
	
	$db = new Connection;
	
	$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	

	
		
		$sql="SELECT  gara.codGara,cane.numeroChip,categoria.categGara,cane.codProprietario,razza.nomeRazza FROM cane,categoria,candidato,gara,razza
		WHERE categoria.codCateg=gara.codCateg
        AND categoria.codCateg=razza.codCateg
        AND candidato.codGara=gara.codGara
        AND candidato.numeroChip=cane.numeroChip
		";
		$result = $conn->query($sql);
	
	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
						
									echo "<tr>";
									echo "<td>".$row['codGara']."</td>";
									echo "<td>".$row['numeroChip']."</td>";
									echo "<td>".$row['categGara']."</td>";
									echo "<td>".$row['codProprietario']."</td>";
									echo "<td>".$row['nomeRazza']."</td>";
								echo "</tr>";
									echo "</form>";
			}									
		}else{
					echo "<h2 style='text-align:center; color:white;'>Non ci sono candidati</h2>";
		}
		
		
	
		$conn->close();echo "</table>";
?>

</body>
</html>