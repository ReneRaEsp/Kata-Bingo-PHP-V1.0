<?php

use PHPUnit\Framework\TestCase;
/*use App\User;*/

class UserTest extends TestCase
{
	protected $number;

	public function setUp(): void
	{
		$this->number = new Number;
	}

	public function test_can_call_numbers()
	{
		$this->user->setName("René");
		$this->assertEquals($this->user->getName(), "René");
	}
}
