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

	public function testSortBoardingCardList(): void
	{
		$journeyListNotSorted = [
			[
				'vehicule'        => 'flight',
				'from'            => 'Stockholm',
				'to'              => 'New York JFK',
				'seat'            => '7B',
				'gate'            => '22',
				'baggage'         => 'auto',
				'vehicule number' => 'SK22',
			],
			[
				'vehicule'        => 'train',
				'from'            => 'Madrid',
				'to'              => 'Barcelona',
				'seat'            => '45B',
				'vehicule number' => '78A',
			],
			[
				'vehicule'        => 'flight',
				'from'            => 'Gerona Airport',
				'to'              => 'Stockholm',
				'seat'            => '3A',
				'gate'            => '45B',
				'baggage'         => 'ticket counter 344',
				'vehicule number' => 'SK455',
			],
			[
				'vehicule'        => 'bus',
				'from'            => 'Barcelona',
				'to'              => 'Gerona Airport',
				'vehicule number' => null,
			],
		];

		$journeyListSorted = [
			[
				'vehicule'        => 'train',
				'from'            => 'Madrid',
				'to'              => 'Barcelona',
				'seat'            => '45B',
				'gate'            => null,
				'baggage'         => null,
				'vehicule number' => '78A',
			],
			[
				'vehicule'        => 'bus',
				'from'            => 'Barcelona',
				'to'              => 'Gerona Airport',
				'seat'            => null,
				'gate'            => null,
				'baggage'         => null,
				'vehicule number' => null,
			],
			[
				'vehicule'        => 'flight',
				'from'            => 'Gerona Airport',
				'to'              => 'Stockholm',
				'seat'            => '3A',
				'gate'            => '45B',
				'baggage'         => 'ticket counter 344',
				'vehicule number' => 'SK455',
			],
			[
				'vehicule'        => 'flight',
				'from'            => 'Stockholm',
				'to'              => 'New York JFK',
				'seat'            => '7B',
				'gate'            => '22',
				'baggage'         => 'auto',
				'vehicule number' => 'SK22',
			],
		];

		$journey = new Journey($this->createMockBoardingCardList($journeyListNotSorted));

		$journey->sortBoardingCardList();

		$this->assertEquals($journeyListSorted, $journey->boardingCardListSorted);
	}

	public function createMockBoardingCardList($journeyListMock): array
	{
		$listMock = [];

		foreach ($journeyListMock as $boardingCard) {
			$boardingCardMock = $this->createMock(BoardingCard::class);

			$boardingCardMock->vehicule = $boardingCard['vehicule'];
			$boardingCardMock->from = $boardingCard['from'];
			$boardingCardMock->to = $boardingCard['to'];
			$boardingCardMock->seat = $boardingCard['seat'];
			$boardingCardMock->gate = $boardingCard['gate'];
			$boardingCardMock->baggage = $boardingCard['baggage'];
            $boardingCardMock->vehicule_number = $boardingCard['vehicule number'];

			$listMock[] = $boardingCardMock;
		}

		return $listMock;
	}
}
