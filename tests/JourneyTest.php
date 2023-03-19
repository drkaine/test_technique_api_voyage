<?php

declare(strict_types=1);

namespace tests;

use models\BoardingCard;
use models\Journey;
use PHPUnit\Framework\TestCase;

require_once './autoload.php';

class JourneyTest extends TestCase
{
	public function testCreatejourneys(): void
	{
		$boardingCardMock = $this->getMockBuilder(BoardingCard::class)
			->disableOriginalConstructor()
			->getMock();

		$journey = new Journey([$boardingCardMock]);

		$this->assertInstanceOf(Journey::class, $journey);

		$this->assertInstanceOf(BoardingCard::class, $journey->boardingCardListNotSorted[0]);
	}
}
