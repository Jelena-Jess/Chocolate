<?php
$category=isset($_GET['cid'])&&is_numeric($_GET['cid'])?$_GET['cid']:1;
$recipes=Recipe::getAll("where category = $category");
foreach($recipes as $rw){
?>
<figure class="imageleft">
			<a href="index.php?page=6&cid=<?php echo $rw->id; ?>"><img id="recipes_image_small" src="images/<?php echo $rw->image_small;?>" alt=<?php echo $rw->name; ?>>
			<figcaption><b><?php echo $rw->name; ?></b></figcaption></a>
</figure>
<?php
}
?>

