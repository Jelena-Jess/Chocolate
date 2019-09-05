<?php
require "../config.php";
if(!Session::get("status") || Session::get("status")!=3){
	header("location:../welcome.php");
}

$selectedComment = new Comment;

if(isset($_GET['rid'])){
	$selectedComment = Comment::get($_GET['rid']);
}

if(isset($_POST['btn_insert'])){
	$selectedComment = new Comment;
	$selectedComment->comment=$_POST['comment'];
	$selectedComment->user_id=$_POST['sel_user'];
	$selectedComment->recipe_id=$_POST['sel_recipe'];
	$selectedComment->insert();
}
if(isset($_POST['btn_delete'])){
	$selectedComment = new Comment;
	$selectedComment->id_comment = $_GET['rid'];
	$selectedComment->delete($_GET['rid']);
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
	</ul>
	</nav><!-- end nav -->
<div id="adminMain">
<h2>Manage comments:</h2>
<form action="" method="post" enctype="multipart/form-data">
	<select onchange="if(this.value<0) return; window.location='?rid='+this.value" name="selComment">
	<option value="-1"> Select a comment</option>
	<?php
	$allComments = Comment::getAll();
		foreach ($allComments as $rw){
			echo "<option ". ($selectedComment->id_comment==$rw->id_comment?"selected":"") . " value='{$rw->id_comment}'>{$rw->comment}</option>";
		}
	?>
	</select>
	<br>
	Comment: <br>
		<input type="text" name="comment" value="<?php echo $selectedComment->comment; ?>">
		<br>
	User: <br>
		<select name="sel_user">
		<option value="-1"> Select a user</option>
		<?php
		$allUsers = User::getAll();
		foreach ($allUsers as $rw){
		echo "<option ". ($selectedComment->user_id==$rw->id ? "selected" : "") . " value='{$rw->id}'>{$rw->username}</option>";
		}
		?>
		</select>
		<br>
	Recipe: <br>
		<select name="sel_recipe">
		<option value="-1"> Select a recipe</option>
		<?php
		$allRecipes = Recipe::getAll();
		foreach ($allRecipes as $rw){
		echo "<option ". ($selectedComment->recipe_id==$rw->id ? "selected" : "") . " value='{$rw->id}'>{$rw->name}</option>";
		}
		?>
		</select>
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
