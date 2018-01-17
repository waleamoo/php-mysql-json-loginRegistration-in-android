<?php

require_once "connection.php";
// header to indicate the response will be in json format
header('Content-Type: application/json');

class User{
	private $db;
	private $connection;
	
	
	function __construct(){
		$this->db = new DB_Connection();
		$this->connection = $this->db->get_connection();
	}
	
	public function does_user_exist($email, $password){
		$query = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
		$result = mysqli_query($this->connection, $query);
		if(mysqli_num_rows($result) > 0){
			$json['success'] = ' Welcome ' . $email;
			echo json_encode($json);
			mysqli_close($this->connection);
		}else{
			// if the user does not exist, create a new user 
			$query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
			$is_inserted = mysqli_query($this->connection, $query);
			if($is_inserted == 1){
				// meaning new user has been created 
				$json['success'] = 'Account created, welcome ' . $email;
			}else{
				$json['error'] = ' Wrong Passowrd ';				
			}
			// encode the response in json
			echo json_encode($json);
			mysqli_close($this->connection);
		}
	}
}

$user = new User();
if(isset($_POST["email"],$_POST["password"])){
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	// if both the email and password are not empty, then we can login
	if(!empty($email) && !empty($password)){
		$encrypted_password = md5($password);
		$user->does_user_exist($email, $encrypted_password);
	}else{
		// if the user did not fill in email and password
		echo json_encode("You must fill both fields");  
	}
}

?>