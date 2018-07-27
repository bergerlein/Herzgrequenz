<?php

class person {

	private $name;
	private $age;
	private $hobbies = array('lesen', 'schwimmen', 'tanzen');

	public function __construct($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function setAge($age) {
		if (is_int($age)) {
			$this->age = $age;
			return true;
		} 
		else {
			return false;
		}
	}

	public function getHobbies() {
		return $this->hobbies;
	}

	public function getHobbiesAsJson() {
		return json_encode($this->hobbies);
	} 
}
