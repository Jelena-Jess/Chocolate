<?php  
class Comment extends ActiveRecord{
	public $id_comment, $user_id, $recipe_id, $comment; 
	public static $table = "comments";
	public static $key = "id_comment";
	
	public function insertComment($user,$recipe,$comment){
			$conn = Database::getInstance();
			
			$st = $conn ->prepare("insert into ".self::$table." values(null,:user_id,:recipe_id,:comment)");
			
			$st->bindParam(':user_id',$user);
			$st->bindParam(':recipe_id',$recipe);
			$st->bindParam(':comment',$comment);
			
			$st->execute();
			if(!$st){
			echo "\nPDOStatement::errorInfo():\n";
			$arr = $st->errorInfo();
			print_r($arr);	
			}
	}
}
?>


