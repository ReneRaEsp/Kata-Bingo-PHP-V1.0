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
		$this->number->setRandomNumber();

		$range = $this->number->getRandomNumber() >= 1 && $this->number->getRandomNumber() <= 75;

		$this->assertTrue($range);
	}
}
