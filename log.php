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
		<a href="welcome.php"><p>ChocoTale</p></a>
		<img id="logo" src="images/Small+Truffles+White+Background.jpg" alt="Logo">
	</header><!-- end header -->
	
	<nav id="nav">
	<ul class="nav-welcome">
		<li><a href="log.php">Log in</a></li>
		<li><a href="reg.php">Register</a></li>
	</ul>
	</nav>
	<div id="content">
	<div id="reg">
		<?php 
			if(isset($_GET["info"])&& $_GET["info"]==3){
				?>
				<p class="info">Successful registration, please log in.</p>
				<?php
				} 
			if(isset($_GET["info"])&& $_GET["info"]==1){
			?>
			<p class="info">Please enter your valid username and password.</p>
			<?php
			}
		?>
			<h3>Log in</h3>
			<form action="login.php" method="post">
			<input type="text" name="tbUsername" placeholder="Username">
			<input type="text" name="tbPassword" placeholder="Password">
			<input type="submit" name="btnSubmit" value="Log in">
			</form>
		
		</div>

	<footer id="footer">
		<?php include_once "templates/footer.php"; ?>
	</footer>
	
</div>
</body>
</html>
