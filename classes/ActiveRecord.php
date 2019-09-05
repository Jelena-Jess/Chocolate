<?php
//pokriva situacije rada sa bazom podataka
abstract class ActiveRecord {
	//metoda vraca sve redove iz odredjene tabele:
	public static function getAll($filter=""){
		$conn=Database::getInstance();
		$q=$conn->query("select * from ".static::$table . " " . $filter);
		$res = $q->fetchALL(PDO::FETCH_CLASS,get_called_class());
		return $res;;
	}
	//vracamo jedan red:
	public static function get($id){
		$conn=Database::getInstance();
		$q=$conn->query("select * from ".static::$table . " where ".static::$key." = " . $id);
		return $q->fetch(PDO::FETCH_OBJ);
	}
	public function save(){
			$fields="";
			foreach($this as $k=>$v){
				if($k == static::$key){continue;}
				$fields .= "{$k}='{$v}',";
			}
			$fields = rtrim($fields,",");
			return $fields;
		}
	public function insert(){
		$table =static::$table;
		$conn = Database::getInstance();
		$querry = "insert into {$table} set ";
		$querry .= $this ->save();
		$conn -> exec($querry);
	}
			
	public function delete($id){
		$conn=Database::getInstance();
		$conn->exec("delete from " . static::$table . " where " . static::$key . "= {$id}");
		}
	// public static function delete($id){
			// $conn = Database::getInstance();
			// $st = $conn->prepare( "delete from ".static::$table." where ".static::$key." = :id");
			
			// $st->bindParam(':id',$id);
			// $st->execute();
			// if(!$st){
			// echo "\nPDOStatement::errorInfo():\n";
			// $arr = $st->errorInfo();
			// print_r($arr);	
			// }
}
