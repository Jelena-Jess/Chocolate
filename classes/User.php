<?php
class User extends ActiveRecord {
		public $id;	
		public $name;
		public $username;	
		public $email;	
		public $password;	
		public $status;
		
	public static $table = "users";
	public static $key = "id";
	
	public function setSessions(){
		Session::set("status", $this->status);
	}
	public static function login($username, $password){
		$users = self::getAll("where username='{$username}' and password='{$password}' limit 1");
		if(count($users)==1){
			$users[0]->setSessions();
			return $users[0];
		}else{
			return null;
		}
	}
	
	public static function logout(){
		Session::stop();
	}
		
	public static function register($name, $email, $username, $password, $status =1){
		$conn = Database::getInstance();
		$status = 1;
		$st = $conn ->prepare("insert into ". self::$table . " values(null,:name, :email, :username, :password,".$status.")");
		$st->bindParam(':name',$name);
		$st->bindParam(':email',$email);
		$st->bindParam(':username',$username);
		$st->bindParam(':password',$password);
		$st->execute();	
		if(!$st){
			echo "\nPDOStatement::errorInfo():\n";
			$arr = $st->errorInfo();
			print_r($arr);	
			}
			else {header("location:welcome.php?info=3");
	
					}						
	}
}
		