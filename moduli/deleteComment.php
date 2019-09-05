<?php 
require_once("../config.php");

echo  stripParams($_SERVER['HTTP_REFERER'])."<br>";
echo  stripParams(Session::get("referer"))."<br>";

if(isset($_POST['deleteComment']) && stripParams(Session::get("referer")) == stripParams(Session::get("referer")) && Session::get("loggedin")){
	
	$aid=$_GET["cid"];
	$id = $_GET["id"];
	$com = Comment::delete($id);
	header("location:../index.php?page=6&cid=$aid");
}
else{	
header("location:../index.php");
}
?>

