<?php

declare(strict_types=1);

namespace tests;

use models\Formatter;
use PHPUnit\Framework\TestCase;

require_once './autoload.php';

class FormatterTest extends TestCase
{
	public function testTransformJsonToArray(): void
	{
		$informationsJson = '{"vehicule" : "train","from" : "Madrid","to" : "Barcelona","seat" : "45B","gate" : "","baggage" : ""}';

		$informationsArray = [
			'vehicule'  => 'train',
			'from'      => 'Madrid',
			'to'        => 'Barcelona',
			'seat'      => '45B',
			'gate'      => null,
			'baggage'   => null,
		];

		$this->assertEquals($informationsArray, Formatter::transformJsonToArray($informationsJson));
	}
}
