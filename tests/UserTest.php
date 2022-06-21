<?php

use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase
{
	protected $user;

	public function setUp(): void
	{
		$this->user = new User;
	}

	public function test_i_can_the_name()
	{
		$this->user->setName("René");
		$this->assertEquals($this->user->getName(), "René");
	}

	public function test_i_can_get_the_lastname()
	{
		$this->user->setLastname("Ramírez");
		$this->assertEquals($this->user->getLastame(), "Ramírez");
	}

	public function test_i_can_get_the_email()
	{
		$this->user->setEmail("rdejramirez@gmail.com");
		$this->assertEquals($this->user->getEmail(), "rdejramirez@gmail.com");
	}

	public function test_i_can_get_the_fullname()
	{
		$this->assertEmpty($this->user->getFullName());
	}

	public function test_name_lastname_email_without_spaces()
	{
		$this->user->setName("Rene ");
		$this->user->setLastname(" Ramirez");
		$this->user->setEmail(" email@mail.com");

		$this->assertEquals($this->user->getName(), "Rene");
		$this->assertEquals($this->user->getLastame(), "Ramirez");
		$this->assertEquals($this->user->getEmail(), "email@mail.com");
	}
}
