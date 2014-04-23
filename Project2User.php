<?php
class User{

	// Login variables
	private $userID;
	private $password;
	private $isAdmin;

	// Enrollment variables
	private $took100;
	private $took231;
	private $took232;
	private $took331;
	private $took335;


	function __Construct($userID, $password, $isAdmin, $took100, $took231, $took232, $took331, $took335) {
		
		$this->userID = $userID;
		$this->password = $password;
		$this->isAdmin = $isAdmin;

		$this->took100 = $took100;
		$this->took231 = $took231;
		$this->took232 = $took232;
		$this->took331 = $took331;
		$this->took335 = $took335;
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


	function get_took100() {
		return $this->took100;
	}
	function get_took231() {
		return $this->took231;
	}
	function get_took232() {
		return $this->took232;
	}
	function get_took331() {
		return $this->took331;
	}
	function get_took335() {
		return $this->took335;
	}
	
}

?>
