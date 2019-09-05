<?php
session_start();
if(!isset($_SESSION['status']) || $_SESSION['status']!=1){
	header("location: welcome.php");
}
require "config.php";
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>ChocoTale</title>
	<link href="https://fonts.googleapis.com/css?family=PT+Serif|Princess+Sofia" rel="stylesheet"> 
	<link href="style.css" type="text/css" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>

<body>
<div id="wrapper">
	<?php include_once "templates/header.php"; ?>
	<div id="content">
	<div id="main">
	<?php
	$default_page=(isset($_GET['page']))&&is_numeric($_GET["page"])?$_GET['page']:1;
	$pages=array(
		"1"=>"index.php",
		"2"=>"production.php",
		"3"=>"types.php",
		"4"=>"recipes.php",
		"5"=>"recepti.php",
		"6"=>"recept.php",
		"7"=>"logout.php"
	);
	include "moduli/" . $pages[$default_page];
	?>
	</div><!-- end main -->	
	
	<aside id="sidebar">
		<?php include_once "templates/sidebar.php"; ?>
	</aside>
	</div>
	
	<footer id="footer">
		<?php include_once "templates/footer.php"; ?>
	</footer>

</div>
</body>
</html>
