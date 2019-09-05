<?php
include "config.php";

class Category extends ActiveRecord {
	public static $table = "categories";
	public static $key = "id";
}

$cat = new Category;
$cat->title="My New Category";
$cat->image="smalldo.jpg";
$cat->insert();