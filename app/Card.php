<?php

namespace App;

class Card
{
	protected $column_b;
	protected $column_i;
	protected $column_n;
	protected $column_g;
	protected $column_o;

	protected $previous_numbers = [];


	public function __construct()
	{
		$this->setColumnB();
		$this->setColumnI();
		$this->setColumnN();
		$this->setColumnG();
		$this->setColumnO();
	}


	public function setColumnB()
	{
		$this->previous_numbers = [];
		for ($i = 0; $i <= 4; $i++) {
			$this->column_b[$i] = rand(1, 15);

			foreach ($this->previous_numbers as $prev) {
				while ($prev === $this->column_b[$i]) {
					$this->column_b[$i] = rand(1, 15);
				}
			}
			$this->previous_numbers[$i] = $this->column_b[$i];
		}
	}

	public function getColumnB()
	{
		return $this->column_b;
	}

	public function setColumnI()
	{
		$this->previous_numbers = [];
		for ($i = 0; $i <= 4; $i++) {
			$this->column_i[$i] = rand(16, 30);

			foreach ($this->previous_numbers as $prev) {
				while ($prev === $this->column_i[$i]) {

					$this->column_i[$i] = rand(16, 30);
				}
			}
			$this->previous_numbers[$i] = $this->column_i[$i];
		}
	}

	public function getColumnI()
	{
		return $this->column_i;
	}

	public function setColumnN()
	{
		$this->previous_numbers = [];
		for ($i = 0; $i <= 4; $i++) {
			$this->column_n[$i] = rand(31, 45);

			foreach ($this->previous_numbers as $prev) {
				while ($prev === $this->column_n[$i]) {

					$this->column_n[$i] = rand(31, 45);
				}
			}
			if ($i === 2) {
				$this->column_n[$i] = 0;
			}
			$this->previous_numbers[$i] = $this->column_n[$i];
		}
	}

	public function getColumnN()
	{
		return $this->column_n;
	}

	public function setColumnG()
	{
		$this->previous_numbers = [];
		for ($i = 0; $i <= 4; $i++) {
			$this->column_g[$i] = rand(46, 60);

			foreach ($this->previous_numbers as $prev) {
				while ($prev === $this->column_g[$i]) {

					$this->column_g[$i] = rand(46, 60);
				}
			}
			$this->previous_numbers[$i] = $this->column_g[$i];
		}
	}

	public function getColumnG()
	{
		return $this->column_g;
	}

	public function setColumnO()
	{
		$this->previous_numbers = [];
		for ($i = 0; $i <= 4; $i++) {
			$this->column_o[$i] = rand(61, 75);

			foreach ($this->previous_numbers as $prev) {
				while ($prev === $this->column_o[$i]) {

					$this->column_o[$i] = rand(61, 75);
				}
			}
			$this->previous_numbers[$i] = $this->column_o[$i];
		}
	}

	public function getColumnO()
	{
		return $this->column_o;
	}
}
