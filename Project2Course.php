<?php
class Course{

	private $courseNo;
	private $courseName;
	private $maxSeats;
	private $currentSeats;
	private	$seq;


	function __Construct($courseNo, $courseName, $maxSeats, $currentSeats, $seq) {
		
		$this->courseNo = $courseNo;
		$this->courseName = $courseName;
		$this->maxSeats = $maxSeats;
		$this->currentSeats = $currentSeats;
		$this->seq = $seq;
	}

	

	function get_courseNo() {
		return $this->courseNo;
	}
	
	function get_courseName() {
		return $this->courseName;
	}
	
	function get_maxSeats() {
		return $this->maxSeats;
	}
	
	function get_currentSeats(){
		return $this->currentSeats;
	}
	
	function get_seq(){
		return $this->seq;
	}
	
}

?>