<?php
class Person
{
	private $_name;
	private $_job;
	private $_age;
	
	public function __construct()
	{
		$this->_name = $name;
		$this->_job = $name;
		$this->_age = $name;
	}
	
	public function changeJob($newjob) 
	{
		$this->_job = $newjob;
	}
	
	public function happyBirthday()
	{
		++$this->_age;
	}
}

// Create two new people
$person1 = new Person("Tom", "Button-Pusher", 34);
$person2 = new Person("John", "Lever Puller", 41);

// Output their starting point
echo "<pre>Person 1: ", print_r($person1, TRUE), "</pre>";
echo "<pre>Person 2: ", print_r($person2, TRUE), "</pre>";