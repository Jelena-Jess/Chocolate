<?php
$token = uniqid(mt_rand(), TRUE);
Session::set('token',$token);

	$aid = $_GET["cid"];
	$recipe=isset($_GET['cid'])&&is_numeric($_GET['cid'])?$_GET['cid']:1;
		$recipes=Recipe::getAll("where id =$recipe");
		foreach($recipes as $rw){
			?>
		<article>
			<h1><?php echo $rw->name; ?></h1>	
			<p class="imgtext"><?php echo $rw->description; ?></p>
			<img id="recipes_image_big" class="image" src="images/<?php echo $rw->image_big;?>"  alt="<?php echo $rw->name; ?>">

			<h3>Ingredients</h3>
			<ul class="ingredients"> 
				<li><?php echo $rw->ingredients; ?></li>
			</ul>
			<h3>Instructions</h3>
			<p><?php echo $rw->instructions; ?></p>
		</article>
<?php
		}
?>
		<?php if(Session::get("loggedin")){?>
		<div id="comment_form">
			<h3>What do you think about the recipe? Share your thoughts.</h3>
			<form method="POST" action="moduli/insertComment.php">
			<p>
				<label for="com"></label><br>			
				<input type="hidden" name="recipe" value="<?php echo $aid;?>">
				<input type="hidden" name="token" value="<?php echo Session::get('token');?>">
				<input type="hidden" name="user" value="<?php echo Session::get('id');?>">
				<textarea name="comment" id="com" placeholder="Type your comment here..."></textarea><br>
			</p>
			<p>
				<input type="submit" name="submit" value = "Post">
			</p>
			</form>
		</div><!--end of user comment -->
		<?php }?>
		
		<?php
			$aid=isset($_GET['cid'])&&is_numeric($_GET['cid'])?$_GET['cid']:1;
			$comments = Comment::getAll("join users on comments.user_id = users.id where comments.recipe_id =".$aid);
		foreach ($comments as $comment){
			?>
		<article id="comment" <?php if(Session::get("user") == $comment->username){echo 'id="loggedin"';}?>>
			<p><strong><?php echo $comment->username; ?> says: </strong><?php echo $comment->comment; ?></p>
			<?php 
			if(Session::get("loggedin") && Session::get("user") == $comment->username){?>
			<form method="POST" action="moduli/deleteComment.php?cid=<?php echo $aid; ?>&id=<?php echo $comment->id_comment; ?>">
			<input type="submit" name="deleteComment" value="Delete your comment">
			</form>
			<?php }?>
			</article>
		<?php
		}
?>

