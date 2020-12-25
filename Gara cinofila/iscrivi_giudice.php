<html>
<head>
	<meta charset="utf-8">
	<title>Eventi</title>
	<link href="css/visualizza.css" rel="stylesheet">

</head>
	
<body>
<a href="home_segretaria.php" class="indietro">&laquo; Indietro</a>

<img class="header__logo" src="images/logo_sito.png">

<table  align="center" >

	<tr>
		<td id="header" colspan="8"><h1>Gara - Cinofila</h1></td>
	</tr>
	<tr>
		<th>codGara</th>
		<th>Categoria Gara</th>
		<th>Razza</th>
		<th>Peso</th>
		<th>Altezza Garrese</th>
		<th>Altezza Coscia</th>
		<th>Data</th>
		<th>Scegli Gara</th>

	</tr>
<?php
	
	include("lib/lib_connection.php");
	
	$db = new Connection;
	
	$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	

	
		
		$sql="SELECT  categoria.codCateg ,categoria.categGara,razza.codRazza,razza.nomeRazza,razza.raPeso,razza.raAltGarrese,razza.raAltCoscia,gara.codGara,gara.data
			FROM razza,gara,categoria
			WHERE categoria.codCateg=razza.codCateg
			AND	categoria.codCateg=gara.codCateg";
		$result = $conn->query($sql);
	
	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
						
									echo "<tr>";
									echo "<form action='giudice_iscritto.php?msg=".$row['codGara']."' method='post'  onSubmit='return avviso()'>  ";
									echo "<td>".$row['codGara']."</td>";
									echo "<td>".$row['categGara']."</td>";
									echo "<td>".$row['nomeRazza']."</td>";
									echo "<td>".$row['raPeso']."</td>";
									echo "<td>".$row['raAltGarrese']."</td>";
									echo "<td>".$row['raAltCoscia']."</td>";
									echo "<td>".$row['data']."</td>";
									echo "<td><input type='submit' class='prenota' value='Scelto'></td>";
									echo "</tr>";
									echo "</form>";
			}									
		}else{
					echo "<h2 style='text-align:center;'>Non ci sono giudici</h2>";
		}
		
		
	
		$conn->close();echo "</table>";
		
		
		
		
?>

</body>
</html>