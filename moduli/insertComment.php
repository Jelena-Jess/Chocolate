<?php 
require_once("../config.php");

if($_POST['token'] != Session::get('token')){
	header("location:../index.php");
	
}
else if (isset($_POST['submit'])){
$user = $_POST['user'];
$recipe = $_POST['recipe'];
$text = $_POST['comment'];
$text = str_replace("'"," ",$text);
$text = str_replace("-"," ",$text);
$comment = new Comment;
$comment -> insertComment($user,$recipe,$text);
header("location:../index.php?page=6&cid=$recipe");
}
else {
	header("location:../welcome.php");
}



?>
