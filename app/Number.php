<?php

namespace App;

class Number
{
	protected $random_number;

	public function __construct()
	{
		$this->random_number = rand(1, 75);
	}

	public function setRandomNumber()
	{
		$this->random_number = rand(1, 75);
	}

	public function getRandomNumber()
	{
		return $this->random_number;
	}
}
