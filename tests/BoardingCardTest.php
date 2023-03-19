<?php

declare(strict_types=1);

namespace tests;

use models\BoardingCard;
use PHPUnit\Framework\TestCase;

require_once './autoload.php';

class BoardingCardTest extends TestCase
{
	public function testcreateBoardingCards(): void
	{
		$informations = [
			'vehicule' => 'train',
			'from'     => 'Madrid',
			'to'       => 'Barcelona',
			'seat'     => '45B',
			'gate'     => null,
			'bagage'   => null,
		];

		$this->assertNotInstanceOf(BoardingCard::class, new BoardingCard($informations));
	}
}
