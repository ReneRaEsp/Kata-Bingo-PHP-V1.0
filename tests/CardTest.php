<?php

use PHPUnit\Framework\TestCase;
use App\Card;
use App\Number;
use App\WinCasesHelper;

use function PHPUnit\Framework\assertTrue;

class CardTest extends TestCase
{
	protected $card;
	protected $number;

	public function setUp(): void
	{
		$this->card = new Card;
		$this->number = new Number;
	}

	public function test_can_generate_bingo_cards()
	{
		$this->setUp();

		$B = $this->card->getColumnB();
		$I = $this->card->getColumnI();
		$N = $this->card->getColumnN();
		$G = $this->card->getColumnG();
		$O = $this->card->getColumnO();

		$this->assertIsArray($B);
		$this->assertIsArray($I);
		$this->assertIsArray($N);
		$this->assertIsArray($G);
		$this->assertIsArray($O);
	}

	public function test_columns_are_within_range()
	{
		$this->setUp();
		for ($i = 0; $i <= 4; $i++) {
			$rangeB = $this->card->getColumnB()[$i] >= 1 && $this->card->getColumnB()[$i] <= 15;
			$rangeI = $this->card->getColumnI()[$i] >= 16 && $this->card->getColumnI()[$i] <= 30;
			$rangeG = $this->card->getColumnG()[$i] >= 46 && $this->card->getColumnG()[$i] <= 60;
			$rangeO = $this->card->getColumnO()[$i] >= 61 && $this->card->getColumnO()[$i] <= 75;
			$this->assertTrue($rangeB);
			$this->assertTrue($rangeI);
			$this->assertTrue($rangeG);
			$this->assertTrue($rangeO);
		}

		for ($i = 0; $i <= 3; $i++) {
			$rangeN = $this->card->getColumnN()[$i] === 0 || $this->card->getColumnN()[$i] >= 31 && $this->card->getColumnN()[$i] <= 45;
			$this->assertTrue($rangeN);
		}
	}

	public function test_numbers_cannot_repeat()
	{
		$this->setUp();

		$previous_numbers = [];
		$i = 0;

		foreach ($this->card->getColumnB() as $number) {
			foreach ($previous_numbers as $prev) {
				if ($number === $prev) {
					assertTrue(false);
				} else {
					assertTrue(true);
				}
			}
			$previous_numbers[$i] = $number;
		}

		$previous_numbers = [];
		$i = 0;

		foreach ($this->card->getColumnI() as $number) {
			foreach ($previous_numbers as $prev) {
				if ($number === $prev) {
					assertTrue(false);
				} else {
					assertTrue(true);
				}
			}
			$previous_numbers[$i] = $number;
		}

		$previous_numbers = [];
		$i = 0;
		foreach ($this->card->getColumnN() as $number) {
			foreach ($previous_numbers as $prev) {
				if ($number === $prev) {
					assertTrue(false);
				} else {
					assertTrue(true);
				}
			}
			$previous_numbers[$i] = $number;
		}

		$previous_numbers = [];
		$i = 0;
		foreach ($this->card->getColumnG() as $number) {
			foreach ($previous_numbers as $prev) {
				if ($number === $prev) {
					assertTrue(false);
				} else {
					assertTrue(true);
				}
			}
			$previous_numbers[$i] = $number;
		}

		$previous_numbers = [];
		$i = 0;

		foreach ($this->card->getColumnO() as $number) {
			foreach ($previous_numbers as $prev) {
				if ($number === $prev) {
					assertTrue(false);
				} else {
					assertTrue(true);
				}
			}
			$previous_numbers[$i] = $number;
		}

		$previous_numbers = [];
		$i = 0;
	}

	public function test_can_mark_numbers()
	{
		$this->setup();
		$numberCalled1 = 7;
		$numberCalled2 = 19;
		$numberCalled3 = 32;
		$numberCalled4 = 57;
		$numberCalled5 = 72;
		$compare = [];
		$i = 0; 
		$this->card->checkCardForAMatch($numberCalled1);
		$this->card->checkCardForAMatch($numberCalled2);
		$this->card->checkCardForAMatch($numberCalled3);
		$this->card->checkCardForAMatch($numberCalled4);
		$this->card->checkCardForAMatch($numberCalled5);

		//Testing that column B can match a number
		foreach($this->card->getColumnB() as $number){
			if($number === 7){
				$compare[$i] = -7;
			}
			$compare[$i] = $number;
			$i++;
		}
		$this->assertEquals($compare, $this->card->getColumnB());

		//Testing that column I can match a number
		$compare = [];
		$i = 0; 
		foreach($this->card->getColumnI() as $number){
			if($number === 19){
				$compare[$i] = -19;
			}
			$compare[$i] = $number;
			$i++;
		}
		$this->assertEquals($compare, $this->card->getColumnI());

		//Testing that column N can match a number
		$compare = [];
		$i = 0; 
		foreach($this->card->getColumnN() as $number){
			if($number === 32){
				$compare[$i] = -32;
			}
			$compare[$i] = $number;
			$i++;
		}
		$this->assertEquals($compare, $this->card->getColumnN());

		//Testing that column G can match a number
		$compare = [];
		$i = 0; 
		foreach($this->card->getColumnG() as $number){
			if($number === 57){
				$compare[$i] = -57;
			}
			$compare[$i] = $number;
			$i++;
		}
		$this->assertEquals($compare, $this->card->getColumnG());

		//Testing that column O can match a number
		$compare = [];
		$i = 0; 
		foreach($this->card->getColumnO() as $number){
			if($number === 72){
				$compare[$i] = -72;
			}
			$compare[$i] = $number;
			$i++;
		}
		$this->assertEquals($compare, $this->card->getColumnO());

		//Testing that card cannot contain the number called
		foreach($this->card->getColumnB() as $number){
			if($number === 7){
				if($number === -7){
				$this->assertTrue(false);
				}
			} 
			$compare[$i] = $number;
			$i++;
		}
	}

	public function test_can_check_if_card_is_the_winner () {

		/*
		$B = [-2, -5, -7, -8, -10];
		$I = [-17, 20, 23, 25, 29];
		$N = [-33, 35, 0, 42, 45];
		$G = [47, 48, 53, 56, 59];
		$O = [-62, 64, 66, 70, 75];
		*/

		$isWinner = false;
		
		for($count = 0; $count <= 75; $count++) {
			$number = new Number;
			$random_number = $number->getRandomNumber();
			$this->assertIsInt($random_number);
			$this->card->checkCardForAMatch($random_number);
		}

		$this->assertTrue($this->card->checkWinCases());

	}
}
