<?php
define("DB", "chocolate");
define("DBHOST", "localhost");
define("DBUSER", "");
define("DBPASS", "");
define("APP_DIR","ChocolateApp");

function autoloadCore($class){
	require_once "classes/{$class}.php";
}
spl_autoload_register("autoloadCore");


function stripParams($string){
	$string1 = strstr($string,"?");
	$len = strlen($string)-(strlen($string1));
	$string2  = substr($string,0,$len);
	return $string2;
}
function clear($string){
	$string1 = str_replace("'","",$string);
	$string2 = str_replace("-","",$string1);
	return $string2;
}
?>