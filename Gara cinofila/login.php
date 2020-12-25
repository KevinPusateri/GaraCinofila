<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link href="css/stylelogin.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
	
<body>

<img class="header__logo" src="images/logo_sito.png">
		

	<div class="loginBox">

		<img  class="user" src="images/user.png">
		<a href="index.html"> home</a><br>
		
		<h3>Accedi qui</h3>
		 	<?php	
		if(isset($_GET['msg']))
			{
				$Message = "<font face='Verdana' size='4' color='black' >Accesso negato riprovare..</font>";
				echo $Message;
			}
			?>
		<form action="sessione.php" method="post">
		
			<div class="inputBox">
				<input type="text" name="username" placeholder="Username">
				<span><i class="fa fa-user" aria-hidden="true"></i></span>
			</div>
			
			<div class="inputBox">
				<input type="password" name="password" placeholder="Password">
				<span><i class="fa fa-lock" aria-hidden="true"></i></span>
			</div>
				<input type="submit" name="submit" value="Login">
		</form> 
		
	</div>
</body>
</html>