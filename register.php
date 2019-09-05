<?php  
require_once "config.php";
if(!isset($_POST["register"]) || empty($_POST["rName"]) || empty($_POST["rEmail"]) || empty($_POST["rUser"]) || empty($_POST["rPass"]))
{
	header("location:reg.php?info=2");
}
else{		
	$name = clear($_POST["rName"]);
	$email = clear($_POST["rEmail"]);
	$username = clear($_POST["rUser"]);
	$password = clear($_POST["rPass"]);
	$password = hash("md5",$password);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("location: reg.php?info=4");
		exit();
	}else{
	$user = User::register($name,$email,$username,$password);
	}
}
if($user){
		header("location: log.php?info=3");
	}

		
	