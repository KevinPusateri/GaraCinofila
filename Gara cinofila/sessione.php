<?php

include("lib/lib_connection.php");	
		$db = new Connection;
		$conn = $db->connect();
		if ($conn->connect_error) {	
		die("Connection failed: " .$conn->connect_error);
		} 	
		session_start();
		
		if(isset($_POST["submit"])){	
			$user=$_POST['username'];
			$pass=$_POST['password'];
			$num=1;
			$num2=2;
			$num3=3;
			$_SESSION["username"]=$user;
			$_SESSION["password"]=$pass;
			
			$result=mysqli_query($conn,"SELECT * FROM credenziali WHERE username='$user' && password='$pass' && tipoaccount='$num'");
			$count=mysqli_num_rows($result);
			if($count>0)
			{
				header("refresh:0;url=home_segretaria.php");
			}
			else
			{
				$result2=mysqli_query($conn,"SELECT * FROM credenziali WHERE username='$user' && password='$pass' && tipoaccount='$num2'");
				$count2=mysqli_num_rows($result2);
				if($count2>0)
				{
					header("refresh:0;url=home_giudice.php");
				}
				else
				{
					$result3=mysqli_query($conn,"SELECT * FROM credenziali WHERE username='$user' && password='$pass' && tipoaccount='$num3'");
					$count3=mysqli_num_rows($result3);
					if($count3>0)
					{
						header("refresh:0;url=home_proprietario.php");
					}
					else
					{
						header("Location:login.php?msg");
					}
				}	
			}
		}
		elseif($_POST["submit"]){
			session_destroy();
		}
		


?>