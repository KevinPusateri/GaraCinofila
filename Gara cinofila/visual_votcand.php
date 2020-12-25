<html>
<head>
	<meta charset="utf-8">
	<title>Gare</title>
	<link href="css/visualizza.css" rel="stylesheet">

</head>
	
<body>
<a href="home_proprietario.php" class="indietro">&laquo; Indietro</a>

<img class="header__logo" src="images/logo_sito.png">

<table  align="center" >

	<tr>
		<td id="header" colspan="6"><h1>Gara - Cinofila</h1></td>
	</tr>
	<tr>
		<th>Nome</th>
		<th>Codice gara</th>
		<th>Categoria</th>
		<th>Data</th>
		<th>Voto</th>
		<th>Commento</th>


	</tr>
<?php
	
	include("lib/lib_connection.php");
	
	$db = new Connection;
	
	$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


		session_start();
					
		$user=$_SESSION['username'];
		$sql = "SELECT proprietario.username FROM proprietario WHERE username='$user'" ;
		$result = $conn->query($sql);
		
					
					
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
										
									$k=$row['username'];
								
							}
						}else{
									echo "<h2 style='text-align:center; color:white;'>errore</h2>";
						}
	

	
		
		$sql="SELECT cane.nome,votazioni.codGara,categoria.categGara,gara.data,votazioni.voto,votazioni.commento
					FROM votazioni,categoria,gara,cane,proprietario,credenziali,candidato
					WHERE votazioni.numeroChip=candidato.numeroChip
					AND candidato.numeroChip=cane.numeroChip
					AND votazioni.codGara=candidato.codGara
					AND candidato.codGara=gara.codGara
					AND categoria.codCateg=gara.codCateg
					AND cane.codProprietario=proprietario.codFiscale
					AND proprietario.username=credenziali.username
					AND proprietario.username='$k'";
		$result = $conn->query($sql);
	
	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
						
									echo "<tr>";
									echo "<td>".$row['nome']."</td>";
									echo "<td>".$row['codGara']."</td>";
									echo "<td>".$row['categGara']."</td>";
									echo "<td>".$row['data']."</td>";
									echo "<td>".$row['voto']."</td>";
									echo "<td>".$row['commento']."</td>";
									echo "</tr>";
									echo "</form>";
			}									
		}else{
					echo "<h2 style='text-align:center; color:white;' >Non ci sono votazioni</h2>";
		}
		
		
	
		$conn->close();echo "</table>";
?>

</body>
</html>