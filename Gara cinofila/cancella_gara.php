<?php
include("lib/lib_connection.php");
	
	$db = new Connection;
	
	$conn = $db->connect();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$sql = "DELETE FROM gara WHERE codGara='$_GET[numeroG]'";
	if($conn->query($sql)){
		header("refresh:0; url=elimina_gare.php");
	}else{
			echo "Non è eliminato";
	}
	
	
?>