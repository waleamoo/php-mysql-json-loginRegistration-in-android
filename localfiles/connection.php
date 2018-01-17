<?php
require_once 'config.php';
 
class DB_Connection{
	
	private $connect;
	// this is the constructor of the class 
	function __construct(){
		$this->connect = mysqli_connect(hostname, username, password, db_name) or die("DB connection error");
	}
	
	/*
	TO ACCESS THE PRIVATE PROPERTY, YOU WILL NEED TO IMPLEMENT THE GETTER AND SETTER FUNCTION
	*/
	
	public function get_connection(){
		return $this->connect;
	}
}

?>
