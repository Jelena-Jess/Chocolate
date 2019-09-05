<?php
require "config.php";
if(!isset($_POST["btnSubmit"]) || empty($_POST['tbUsername']) || empty ($_POST['tbPassword'])){
	header("location: log.php?info=1");
}else{
	$username=clear($_POST['tbUsername']);
	$password= hash("md5",clear($_POST['tbPassword']));
	$user = User::login($username, $password);
	Session::set("user",$user->username);
	Session::set("id",$user->id);
	Session::set("loggedin",true);
	Session::set("referer",$_SERVER["HTTP_REFERER"]);

if($user->status==1){
		header("location: index.php");
	}else{
		header("location: admin/index.php");
	}

}
