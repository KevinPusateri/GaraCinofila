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
		<td id="header" colspan="8"><h1>Gara - Cinofila</h1></td>
	</tr>
	<tr>
		<th>Codice Gara</th>
		<th>Categoria Gara</th>
		<th>Razza</th>
		<th>Peso</th>
		<th>Altezza garrese</th>
		<th>Altezza coscia</th>
		<th>Data</th>
		<th>Elimina</th>

	</tr>
<?php
	
	include("lib/lib_connection.php");
	
	$db = new Connection;
	
	$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	

	
		
		$sql="SELECT gara.codGara,gara.data,categoria.categGara,razza.nomeRazza,razza.raPeso,razza.raAltGarrese,razza.raAltCoscia
				FROM gara,categoria,razza
				WHERE gara.codCateg=categoria.codCateg
				AND razza.codCateg=categoria.codCateg";
		$result = $conn->query($sql);
	
	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
						
									echo "<tr>";
									echo "<td>".$row['codGara']."</td>";
									echo "<td>".$row['categGara']."</td>";
									echo "<td>".$row['nomeRazza']."</td>";
									echo "<td>".$row['raPeso']."</td>";
									echo "<td>".$row['raAltGarrese']."</td>";
									echo "<td>".$row['raAltCoscia']."</td>";
									echo "<td>".$row['data']."</td>";
									echo"<td><a href='cancella_gara.php?numeroG=".$row['codGara']."' class='elimina'>Elimina</a></td>";

									echo "</tr>";
									echo "</form>";
			}									
		}else{
					echo "<h2 style='text-align:center; color:white;'>Non ci sono gare</h2>";
		}
		
		
	
		$conn->close();echo "</table>";
?>

</body>
</html>