<?php
class Category extends ActiveRecord {
	public $id, $title, $image; 
	public static $table = "categories";
	public static $key = "id";
}
