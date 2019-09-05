<h1>Delicious Chocolate Recipes</h1>
<h3><i>Take a look at our lovely suggestions and make your day chocolatey and magical. </i></h3>

<?php
	$categories = Category::getAll();
		foreach ($categories as $rw){
?>
	<figure class="imageleft">
		<a href= "index.php?page=5&cid=<?php echo $rw->id; ?>"><img id="recipes_image_small" src="images/<?php echo $rw->image; ?>" alt= <?php echo $rw->title; ?>>
		<figcaption><b><?php echo $rw->title; ?></b></figcaption>
		</a>
	</figure>
<?php
	}
?>

		
