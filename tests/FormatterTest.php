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
		$informationsJson = '{"vehicule":"train","from":"Madrid","to":"Barcelona","seat":"45B","gate":null,"baggage":null}';

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

	public function testTransformArrayToJson(): void
	{
		$informationsJson = '{"vehicule":"train","from":"Madrid","to":"Barcelona","seat":"45B","gate":null,"baggage":null}';

		$informationsArray = [
			'vehicule'  => 'train',
			'from'      => 'Madrid',
			'to'        => 'Barcelona',
			'seat'      => '45B',
			'gate'      => null,
			'baggage'   => null,
		];

		$this->assertEquals($informationsJson, Formatter::transformArrayToJson($informationsArray));
	}

	public function testTransformBadArrayToJson(): void
	{
		$informationsBadArray = [
			'train',
			'Madrid',
			'Barcelona',
			'45B',
			null,
			null,
		];

		$this->assertEquals(false, Formatter::transformArrayToJson($informationsBadArray));
	}

	public function testTransformBadJsonToArray(): void
	{
		$informationsBadJson = '{"":"train","":"Madrid","":"Barcelona","":"45B","":null,"":null}';

		$this->assertEquals(false, Formatter::transformJsonToArray($informationsBadJson));
	}
}
