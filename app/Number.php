<?php

namespace App;

class Number
{
	protected $random_number;
	protected static $calledNumbers = [];

	public function __construct()
	{
		$actualNumber = rand(1, 75);

		foreach(Number::$calledNumbers as $calledNumber){
			while($calledNumber === $actualNumber) {
				$actualNumber = rand(1, 75);
			}
		}
		array_push(Number::$calledNumbers, $actualNumber);
		
		$this->random_number = $actualNumber;
	}

	public function getRandomNumber()
	{
		return $this->random_number;
	}

	public function setRandomNumber($random_number)
	{
		$this->random_number = $random_number;
	}
}
