<?php

use PHPUnit\Framework\TestCase;
use App\Card;

class CardTest extends TestCase
{
	protected $card;

	public function setUp(): void
	{
		$this->card = new Card;
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
			$rangeN = $this->card->getColumnN()[$i] >= 31 && $this->card->getColumnN()[$i] <= 45;
			$this->assertTrue($rangeN);
		}
	}
}
