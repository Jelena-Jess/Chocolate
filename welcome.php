<?php
require_once "config.php";
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>ChocoTale-Welcome page</title>
	<link href="https://fonts.googleapis.com/css?family=PT+Serif|Princess+Sofia" rel="stylesheet"> 
	<link href="style.css" type="text/css" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>

<body>
<div id="wrapper">
	<header id="header">
		<a><p>ChocoTale</p></a>
		<img id="logo" src="images/Small+Truffles+White+Background.jpg" alt="Logo">
	</header><!-- end header -->
	
	<nav id="nav">
	<ul class="nav-welcome">
		<li><a href="log.php">Log in</a></li>
		<li><a href="reg.php">Register</a></li>
	</ul>
	</nav>
	<div id="content">
	<div id="welcome">
	<h1>Welcome to the World Where Chocolate is King!</h1>
	<h3>Dive into our magical world and discover the best chocolate treats you can easily make.</h3>
	<img class="image" src="images/welcome.jpg" alt="Chocolate">
	</div><!-- end main -->	
		</div>

	<footer id="footer">
		<?php include_once "templates/footer.php"; ?>
	</footer>
	
</div>
</body>
</html>
