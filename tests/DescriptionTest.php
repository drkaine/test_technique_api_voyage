<?php

declare(strict_types=1);

namespace tests;

use models\Description;
use PHPUnit\Framework\TestCase;

require_once './autoload.php';

class DescriptionTest extends TestCase
{
	public function testInstanciationDescription(): void
	{
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

		$description = new Description($journeyListSorted);

		$this->assertInstanceOf(Description::class, $description);
	}
}
