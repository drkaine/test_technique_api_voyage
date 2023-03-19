<?php

declare(strict_types=1);

namespace tests;

use models\Formatter;
use PHPUnit\Framework\TestCase;

require_once './autoload.php';

class FormatterTest extends TestCase
{
	private string $informationsJson;

	private array $informationsArray;

	protected function setUp(): void
	{
		parent::setUp();
		$this->informationsJson = '{"vehicule":"train","from":"Madrid","to":"Barcelona","seat":"45B","gate":null,"baggage":null,"vehicule number":null}';
		$this->informationsArray = [
			'vehicule'        => 'train',
			'from'            => 'Madrid',
			'to'              => 'Barcelona',
			'seat'            => '45B',
			'gate'            => null,
			'baggage'         => null,
			'vehicule number' => null,
		];
	}

	public function testTransformJsonToArray(): void
	{
		$this->assertEquals($this->informationsArray, Formatter::transformJsonToArray($this->informationsJson));
	}

	public function testTransformArrayToJson(): void
	{
		$this->assertEquals($this->informationsJson, Formatter::transformArrayToJson($this->informationsArray));
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
