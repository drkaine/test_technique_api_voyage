<?php

declare(strict_types=1);

namespace tests;

use models\BoardingCard;
use PHPUnit\Framework\TestCase;

require_once './autoload.php';

class BoardingCardTest extends TestCase
{
	private array $informations;

	private BoardingCard $boardingCard;

	protected function setUp(): void
	{
		parent::setUp();
		$this->informations = require_once './config/boardingCardArray.php';
		$this->boardingCard = new BoardingCard($this->informations);
	}

	public function testcreateBoardingCard(): void
	{
		$this->assertInstanceOf(BoardingCard::class, $this->boardingCard);
	}
}
