<html>
<head>
	<meta charset="utf-8">
	<title>Votazione</title>
	<link href="css/visualizza.css" rel="stylesheet">
	<link href="css/giudice.css" rel="stylesheet">
<script>
function avviso(){
	
	alert("votazione effettuata");
}
</script>
</head>
	
<body>
<a href="home_giudice.php" class="indietro">&laquo; Indietro</a>

<img class="header__logo" src="images/logo_sito.png">

<table  align="center" >

	<tr>
		<td id="header" colspan="10"><h1>Gara - Cinofila</h1></td>
	</tr>
	<tr>
		<th>Numero microchip</th>
		<th>Codice Gara</th>
		<th>Categoria Gara</th>
		<th>Razza</th>
		<th>Peso</th>
		<th>Altezza Garrese</th>
		<th>Altezza Coscia</th>
		<th>Voto</th>
		<th>Commento</th>
		<th>Votazione</th>

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
					$sql = "SELECT giudice.username FROM giudice WHERE username='$user'" ;
					$result = $conn->query($sql);
					
					
					
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
										
									$k=$row['username'];
								
							}
						}else{
									echo "<h2 style='text-align:center; color:white;'>errore</h2>";
						}
	

	
		
		$sql="SELECT candidato.numeroChip,candidato.codGara,categoria.categGara,razza.nomeRazza,razza.raPeso,razza.raAltGarrese,razza.raAltCoscia,giudice.idGiudice
				FROM candidato,categoria,razza,gara,giudice,giudicegara,credenziali
				WHERE candidato.codGara=gara.codGara
               			 AND giudicegara.codGara=gara.codGara
               			 AND giudicegara.idGiudice=giudice.idGiudice
						AND categoria.codCateg=gara.codCateg
						AND categoria.codCateg=razza.codCateg
               			AND giudice.username=credenziali.username
						AND giudice.username='$k'";
		$result = $conn->query($sql);
			
	
	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {

									echo "<tr>";
									echo "<form action='voto.php?gara=".$row['codGara']."&num=".$row['numeroChip']."' method='post'  onSubmit='return avviso()'>  ";
									echo "<td>".$row['numeroChip']."</td>";
									echo "<td>".$row['codGara']."</td>";
									echo "<td>".$row['categGara']."</td>";
									echo "<td>".$row['nomeRazza']."</td>";
									echo "<td>".$row['raPeso']."</td>";
									echo "<td>".$row['raAltGarrese']."</td>";
									echo "<td>".$row['raAltCoscia']."</td>";
									echo "<td><input type='number' min='1' max='10' name='voto' style='text-align:center; width:140px; height:30px;' required> </td>";
									echo "<td><textarea name='commento' style='text-align:center; width:140px; height:30px;' placeholder='Commento' maxlength='200' required></textarea>   </td>";   
									echo "<td><input type='submit' class='prenota' value='Vota'></td>";
									echo "</tr>";
									echo "</form>";
			}									
		}else{
					echo "<h2 style='text-align:center; color:white;'>Non ti hanno ancora iscritto attendere</h2>";
		}
		
		
	
		$conn->close();echo "</table>";
?>

</body>
</html>