<?php
session_start();
if(!isset($_SESSION['status']) || $_SESSION['status']!=3){
	header("location:../welcome.php");
}
require "../config.php";
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>ChocoTal-Admin page</title>
	<link href="https://fonts.googleapis.com/css?family=PT+Serif|Princess+Sofia" rel="stylesheet"> 
	<link href="../style.css" type="text/css" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>

<body>
<div id="wrapper">
	<header id="header">
		<a href=""><p>ChocoTale</p></a>
		<img id="logo" src="../images/Small+Truffles+White+Background.jpg" alt="Logo">
	</header><!-- end header -->
	
	<nav id="nav">
	<ul>
		<li><a href="#">Home page</a></li>
		<li><a href="categories.php">Manage categories</a></li>
		<li><a href="recipe.php">Manage recipes</a></li>
		<li><a href="comment.php">Manage user comments</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	</nav><!-- end nav -->
<div>
	<h2>Welcome admin!</h2>
	<img class="image" src="../images/depositphotos_71133607-stock-photo-set-of-chocolate-with-hazelnut.jpg" alt="Chocolate">
</div><!-- end main -->	
	
	
	<footer id="footer">
		<?php include_once "../templates/footer.php"; ?>
	</footer>
	
</div>
</body>
</html>
