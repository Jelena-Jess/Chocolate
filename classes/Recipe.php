<?php
class Recipe extends ActiveRecord {
	public $id, $name, $description, $image_small, $image_big, $ingredients, $instructions, $category;
	public static $table = "recipe";
	public static $key = "id";
}
?>