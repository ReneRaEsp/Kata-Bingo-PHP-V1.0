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
		$this->constructHelper();
	}


	public function setColumnB(array $column_b)
	{
		$this->column_b = $column_b;
	}

	public function getColumnB()
	{
		return $this->column_b;
	}

	public function setColumnI(array $column_b)
	{
		$this->column_i = $column_i;
	}

	public function getColumnI()
	{
		return $this->column_i;
	}

	public function setColumnN(array $column_n)
	{
		$this->column_n = $column_n;
	}

	public function getColumnN()
	{
		return $this->column_n;
	}

	public function setColumnG(array $column_g)
	{
		$this->column_g = $column_g;
	}

	public function getColumnG()
	{
		return $this->column_g;
	}

	public function setColumnO(array $column_o)
	{
		$this->column_o = $column_o;
	}

	public function getColumnO()
	{
		return $this->column_o;
	}

	public function checkCardForAMatch($numberCalled)
	{
		$i = 0;
		foreach($this->column_b as $number) {
			if ($number === $numberCalled) {
				$this->column_b[$i] = -$this->column_b[$i];
			}
			$i++;
		}

		$i = 0;
		foreach($this->column_i as $number) {
			if ($number === $numberCalled) {
				$this->column_i[$i] = -$this->column_i[$i];
			}
			$i++;
		}

		$i = 0;
		foreach($this->column_n as $number) {
			if ($number === $numberCalled) {
				$this->column_n[$i] = -$this->column_n[$i];
			}
			$i++;
		}

		$i = 0;
		foreach($this->column_g as $number) {
			if ($number === $numberCalled) {
				$this->column_g[$i] = -$this->column_g[$i];
			}
			$i++;
		}

		$i = 0;
		foreach($this->column_o as $number) {
			if ($number === $numberCalled) {
				$this->column_o[$i] = -$this->column_o[$i];
			}
			$i++;
		}
	}

	function checkWinCases() 
	{

		$isWinner = false;
		
		if($this->column_b[0] <= 0 && $this->column_i[0] <= 0 && $this->column_n[0] <= 0 && $this->column_g[0] <= 0 && $this->column_o[0] <= 0) {
			$isWinner = true;
		} elseif($this->column_b[0] <= 0 && $this->column_b[1] <= 0 && $this->column_b[2] <= 0 && $this->column_b[3] <= 0 && $this->column_b[4] <= 0) {
			$isWinner = true;
		} elseif($this->column_i[0] <= 0 && $this->column_i[1] <= 0 && $this->column_i[2] <= 0 && $this->column_i[3] < 0 && $this->column_i[4] <= 0) {
			$isWinner = true;
		} elseif($this->column_n[0] <= 0 && $this->column_n[1] <= 0 && $this->column_n[2] <= 0 && $this->column_n[3] <= 0 && $this->column_n[4] <= 0) {
			$isWinner = true;
		} elseif($this->column_g[0] <= 0 && $this->column_g[1] <= 0 && $this->column_g[2] <= 0 && $this->column_g[3] <= 0 && $this->column_g[4] <= 0) {
			$isWinner = true;
		} elseif($this->column_o[0] <= 0 && $this->column_o[1] <= 0 && $this->column_o[2] <= 0 && $this->column_o[3] <= 0 && $this->column_o[4] <= 0) {
			$isWinner = true;
		} elseif($this->column_b[1] <= 0 && $this->column_i[1] <= 0 && $this->column_n[1] <= 0 && $this->column_g[1] <= 0 && $this->column_o[1] <= 0) {
			$isWinner = true;
		} elseif($this->column_b[1] <= 0 && $this->column_i[1] <= 0 && $this->column_n[1] <= 0 && $this->column_g[1] <= 0 && $this->column_o[1] <= 0) {
			$isWinner = true;
		} elseif($this->column_b[2] <= 0 && $this->column_i[2] <= 0 && $this->column_n[2] <= 0 && $this->column_g[2] <= 0 && $this->column_o[2] <= 0) {
			$isWinner = true;
		} elseif($this->column_b[3] <= 0 && $this->column_i[3] <= 0 && $this->column_n[3] <= 0 && $this->column_g[3] <= 0 && $this->column_o[3] <= 0) {
			$isWinner = true;
		} elseif($this->column_b[4] <= 0 && $this->column_i[4] <= 0 && $this->column_n[4] <= 0 && $this->column_g[4] <= 0 && $this->column_o[4] <= 0) {
			$isWinner = true;
		}

		return $isWinner;
	}

	public function constructHelper()
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
}
