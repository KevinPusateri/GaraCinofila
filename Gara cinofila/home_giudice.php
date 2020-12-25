<html>
<head>
	<meta charset="utf-8">
	<title>Gara Cinofila</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.css">
	<link rel="stylesheet" href="css/style_giudice.css">


<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>


	<div class="header clearfix" >
		<img class="header__logo" src="images/logo_sito.png">
		<a href="" class="header__icon-bar">
			<span></span>
			<span></span>
			<span></span>
		</a>
		<ul class="header__menu animate">
			<li class="header__menu__item"><a href="index.html">Home</a></li>
			<li class="header__menu__item"><a href="votazione.php">Votazione</a></li>		
			
			
		</ul>
	</div>
				
	
	
<div class="main">
	<section class="cover">
		<div class="cover__filter"></div>
		<div class="cover__caption">
			<div class="cover__caption__copy">
						<h1>Gara Cinofila</h1>
						<h2>Benvenuto <?php
						session_start();
					include("lib/lib_connection.php");
					$db = new Connection;
					
					$conn = $db->connect();
					
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 

					$user=$_SESSION['username'];
					$sql = "SELECT nome FROM giudice WHERE username='$user'" ;
					$result = $conn->query($sql);
					
					
					
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
										
									echo$row['nome'];
								
							}
						}else{
									echo "<h2 style='text-align:center; color:white;'>errore</h2>";
						}
								
					?></h2>
								<a href="login.php" class="buttonl button1"> Logout</a>

					

			</div>
		</div>
	</section>

	<section class="cards clearfix">
		<div class="card">
			<img class="card__image" src="images/card1.jpg">
			<div class="card__copy">
				<h3>Titolo</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis sequi incidunt optio, asperiores dolorum ratione excepturi. </p>
			</div>
		</div>
		<div class="card">
			<img class="card__image"src="images/card2.jpg">
			<div class="card__copy">
				<h3>Titolo</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis sequi incidunt optio, asperiores dolorum ratione excepturi. </p>
			</div>
		</div>
		<div class="card">
			<img class="card__image"src="images/card3.jpg" >
			<div class="card__copy">
				<h3>Titolo</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis sequi incidunt optio, asperiores dolorum ratione excepturi. </p>
			</div>
		</div>
	</section>


	<section class="banner clearfix">
		<div class="banner__image"></div>
		<div class="banner__copy">
			<div class="banner__copy__text">
				<h3>Banner Titolo</h3>
				<h4>Banner Sottotitolo</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas autem quam, explicabo pariatur sit nisi, adipisci saepe.</p>
			</div>
		</div>
	</section>



<footer class="footer">
	<p>Copyright - 2018 GaraCinofila</p>
</footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
	 $(document).ready(function(){

			$(".header__icon-bar").click(function(e){

				$(".header__menu").toggleClass('is-open');
				e.preventDefault();

			});
	 });
</script>

<script>
	 $(document).ready(function(){

			$(".dropbtn").click(function(e){

				$(".dropdown-content").toggleClass('is-open-men');
				e.preventDefault();

			});
	 });
</script>


</body>
</html>
