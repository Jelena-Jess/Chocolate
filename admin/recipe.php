<?php
require "../config.php";
if(!Session::get("status") || Session::get("status")!=3){
	header("location:../welcome.php");
}
$selectedRecipe = new Recipe;

if(isset($_GET['rid'])){
	$selectedRecipe = Recipe::get($_GET['rid']);
}

if(isset($_POST['btn_insert'])){
	$selectedRecipe = new Recipe;
	$selectedRecipe->name=$_POST['tb_name'];
	$selectedRecipe->description=$_POST['tb_description'];
	
	if(isset($_FILES['image_small'])){
		move_uploaded_file($_FILES['image_small']['tmp_name'],"../images/".$_FILES['image_small']['name']);
		$selectedRecipe->image_small=$_FILES['image_small']['name'];
	}
	if(isset($_FILES['image_big'])){
		move_uploaded_file($_FILES['image_big']['tmp_name'],"../images/".$_FILES['image_big']['name']);
		$selectedRecipe->image_big=$_FILES['image_big']['name'];
	}
	$selectedRecipe->ingredients=$_POST['tb_ingredients'];
	$selectedRecipe->instructions=$_POST['tb_instructions'];
	$selectedRecipe->category=$_POST['sel_category'];
	$selectedRecipe->insert();
}
if(isset($_POST['btn_delete'])){
	$selectedRecipe = new Recipe;
	$selectedRecipe->id = $_GET['rid'];
	$selectedRecipe->delete($_GET['rid']);
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
		<a href="#"><p>ChocoTale</p></a>
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
<h2>Manage recipes:</h2>
<form action="" method="post" enctype="multipart/form-data">
	<select onchange="if(this.value<0) return; window.location='?rid='+this.value" name="selRecipe">
	<option value="-1"> Select a recipe</option>
	<?php
	$allRecipes = Recipe::getAll();
		foreach ($allRecipes as $rw){
			echo "<option ". ($selectedRecipe->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->name}</option>";
		}
	?>
	</select>
	<br>
	Name: <br>
		<input type="text" name="tb_name" value="<?php echo $selectedRecipe->name; ?>">
		<br>
	Description: <br>
		<input type="text" name="tb_description" value="<?php echo $selectedRecipe->description; ?>">
		<br>
	Ingredients: <br>
		<input type="text" name="tb_ingredients" value="<?php echo $selectedRecipe->ingredients; ?>">
		<br>
	Instructions: <br>
		<input type="text" name="tb_instructions" value="<?php echo $selectedRecipe->instructions; ?>">
		<br>
	Category: <br>
		<select name="sel_category">
		<option value="-1"> Select a category</option>
		<?php
		$allCategories = Category::getAll();
		foreach ($allCategories as $rw){
			echo "<option ". ($selectedRecipe->category==$rw->id ? "selected" : "") . " value='{$rw->id}'>{$rw->title}</option>";
		}
		?>
</select>
<br><br>
<img src="../images/<?php echo $selectedRecipe->image_small; ?>" width="400"  height= "282" >
<input type="file" name="image_small">
<br><br>
<img src="../images/<?php echo $selectedRecipe->image_big; ?>" width="560">
<input type="file" name="image_big">
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
