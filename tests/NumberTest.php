<?php

use PHPUnit\Framework\TestCase;
use App\Number;

class NumberTest extends TestCase
{
	protected $number;

	public function setUp(): void
	{
		$this->number = new Number;
	}

	public function test_can_call_out_numbers()
	{
		$this->setUp();
		$calledNumber = $this->number->getRandomNumber();

		$range = $calledNumber >= 1 && $calledNumber <= 75;

		$this->assertTrue($range);
	}

	public function test_numbers_cannot_be_repeated()
	{
		$this->setUp();
		$previousNumbers = [];
		$match = true;
		for($i = 0; $i < 75 ; $i++) {
			$actualNumber = new Number;
			foreach( $previousNumbers as $previousNumber ){
				if($previousNumber !== $actualNumber) {
					$match = true;
				} else {
					$match = false;
				}
			}
			$this->assertTrue($match);
			$previousNumbers[$i] = $actualNumber;
		}
	}
}
