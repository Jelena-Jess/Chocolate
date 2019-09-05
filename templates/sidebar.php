<div>
	<?php if(Session::get("loggedin") === true){?>
	<h3 id="greeting">User: <?php echo Session::get("user");?></h3><?php } ?>
</div>
<div>
	<h3>About</h3>
	<p>This is a website for chocolate lovers. Find out about:</p>
	<ul>
		<li><a href="?page=<?=PRODUCTION?>">How Chocolate is Made</a></li>
		<li><a href="?page=<?=TYPES?>">A Guide to Chocolate Varieties </a></li>
	</ul>
</div>
<div>
	<h3>Check out our recipes</h3>

	<ul>
	<?php
	$categories = Category::getAll();
	foreach ($categories as $rw){
	?>
	<li><a href="index.php?page=5&cid=<?php echo $rw->id; ?>"><?php echo $rw->title; ?></a></li>
	<?php
	}
	?>
	</ul>
</div>

		