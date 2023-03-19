<?php

declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;

require_once './autoload.php';

class FormatterTest extends TestCase
{
	public function testTransformJsonToArray(): void
	{
		$informationsJson = '{
            "vehicule" : "train",
			"from" : "Madrid",
			"to" : "Barcelona",
			"seat" : "45B",
			"gate" : "",
			"bagage" : "",
        }';

		$informationsArray = [
			'vehicule' => 'train',
			'from'     => 'Madrid',
			'to'       => 'Barcelona',
			'seat'     => '45B',
			'gate'     => null,
			'bagage'   => null,
		];

		$formatter = new Formatter($informationsJson);

		$this->assertEquals($informationsArray, $formatter->getInformations());
	}
}