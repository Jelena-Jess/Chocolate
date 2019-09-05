<?php
require_once "data.php";
?>
<header id="header">
		<a><p>ChocoTale</p></a>
		<img id="logo" src="images/Small+Truffles+White+Background.jpg" alt="Logo">
	</header><!-- end header -->
	
	<nav id="nav" class="nav">
		<ul>
			<li><a href="?page=<?=HOME?>">Home page</a></li>
			<li><a href="?page=<?=PRODUCTION?>">How Chocolate is Made</a></li>
			<li><a href="?page=<?=TYPES?>">A Guide to Chocolate Varieties </a></li>
			<li><a href="?page=<?=RECIPES?>">Chocolate Recipes <i class="fas fa-sort-down"></i></a>
			<ul>
			<?php
				$categories = Category::getAll();
				foreach ($categories as $rw){
			?>
				<li><a href="index.php?page=5&cid=<?php echo $rw->id; ?>"><?php echo $rw->title; ?></i></a></li>
			<?php
			}
			?>
			</ul>
			</li>
			<li><a href="?page=<?=LOGOUT?>">Logout</a></li>
		</ul>
	</nav><!-- end nav -->