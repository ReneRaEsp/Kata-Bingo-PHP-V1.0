<?php

namespace App;

class Card
{
	protected $column_b;
	protected $column_i;
	protected $column_n;
	protected $column_g;
	protected $column_o;


	public function __construct()
	{

		for ($i = 0; $i <= 4; $i++) {
			$this->column_b[$i] = rand(1, 15);
			$this->column_i[$i] = rand(16, 30);
			$this->column_g[$i] = rand(46, 60);
			$this->column_o[$i] = rand(61, 75);
		}
		for ($i = 0; $i <= 3; $i++) {
			$this->column_n[$i] = rand(31, 45);
		}
	}


	public function setColumnB()
	{
		for ($i = 0; $i <= 4; $i++) {
			$this->column_b[$i] = rand(1, 15);
		}
	}

	public function getColumnB()
	{
		return $this->column_b;
	}

	public function setColumnI()
	{
		for ($i = 0; $i <= 3; $i++) {
			$this->column_i[$i] = rand(16, 30);
		}
	}

	public function getColumnI()
	{
		return $this->column_i;
	}

	public function setColumnN()
	{

		for ($i = 0; $i <= 3; $i++) {
			$this->column_n[$i] = rand(31, 45);
		}
	}

	public function getColumnN()
	{
		return $this->column_n;
	}

	public function setColumnG()
	{

		for ($i = 0; $i <= 4; $i++) {
			$this->column_g[$i] = rand(46, 60);
		}
	}

	public function getColumnG()
	{
		return $this->column_g;
	}

	public function setColumnO()
	{

		for ($i = 0; $i <= 4; $i++) {
			$this->column_o[$i] = rand(61, 75);
		}
	}

	public function getColumnO()
	{
		return $this->column_o;
	}
}
