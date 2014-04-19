<?php
class User{

	private $userID;
	private $password;
	private $isAdmin;


	function __Construct($userID, $password, $isAdmin) {
		
		$this->userID = $userID;
		$this->password = $password;
		$this->isAdmin = $isAdmin;
	}

	

	function get_userID() {
		return $this->userID;
	}
	
	function get_password() {
		return $this->password;
	}
	
	function get_isAdmin() {
		return $this->isAdmin;
	}
	
}

?>
