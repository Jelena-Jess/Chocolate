<?php
require "../config.php";
if(!Session::get("status") || Session::get("status")!=3){
	header("location:../welcome.php");
}

$selectedCategory = new Category;

if(isset($_GET['cid'])){
	$selectedCategory = Category::get($_GET['cid']);
}

if(isset($_POST['btn_insert'])){
	$selectedCategory = new Category;
	$selectedCategory->title =$_POST['tb_name'];
	if(isset($_FILES['fup_image'])){
		move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/".$_FILES['fup_image']['name']);
	$selectedCategory->image =$_FILES['fup_image']['name'];
	}
	$selectedCategory->insert();
}
if(isset($_POST['btn_delete'])){
	$selectedCategory = new Category;
	$selectedCategory->id = $_GET['cid'];
	$selectedCategory->delete($_GET['cid']);
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>ChocoTale</title>
	<link href="https://fonts.googleapis.com/css?family=PT+Serif|Princess+Sofia" rel="stylesheet"> 
	<link href="../style.css" type="text/css" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>

<body>
<div id="wrapper">
	<header id="header">
		<a><p>ChocoTale</p></a>
		<img id="logo" src="../images/Small+Truffles+White+Background.jpg" alt="Logo">
	</header><!-- end header -->
	
	<nav id="nav">
	<ul>
		<li><a href="index.php">Home page</a></li>
		<li><a href="categories.php">Manage categories</a></li>
		<li><a href="recipe.php">Manage recipes</a></li>
		<li><a href="comment.php">Manage user comments</a></li>
		<li><a href="logout.php">Logout</a></li>
	</nav><!-- end nav -->
<div id="adminMain">
<h2>Manage recipe categories:</h2>
<form action="" method="post" enctype="multipart/form-data">
<select onchange="if(this.value<0) return; window.location='?cid='+this.value" name="selCategory">
<option value="-1"> Select category</option>
<?php
$allCategories = Category::getAll();
	foreach ($allCategories as $rw){
		echo "<option ". ($selectedCategory->id==$rw->id ? "selected" : "") . " value='{$rw->id}'>{$rw->title}</option>";
	}
?>
</select>
<br>
Name: <br>
<input type="text" name="tb_name" value="<?php echo $selectedCategory->title; ?>">
<br>
Image:<br>
<img src="../images/<?php echo $selectedCategory->image; ?>" width="400px"  height= "282px">
<input type="file" name="fup_image">
<br><br>
<input type="submit" name="btn_insert" value="Add new">
<input type="submit" name="btn_delete" value="Delete">

</form><br>
</div><!-- end main -->	
	
	
	<footer id="footer">
		<?php include_once "../templates/footer.php"; ?>
	</footer>
	
</div>
</body>
</html>
