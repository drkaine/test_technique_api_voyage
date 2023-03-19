<?php

declare(strict_types=1);

namespace tests;

use models\Formatter;
use PHPUnit\Framework\TestCase;

require_once './autoload.php';

class FormatterTest extends TestCase
{
	private string $descriptionJson;

	private string $description;

	private array $informationsArray;

	private string $informationsJson;

	protected function setUp(): void
	{
		parent::setUp();
		$this->informationsJson = '{"vehicule":"train","from":"Madrid","to":"Barcelona","seat":"45B","gate":null,"baggage":null,"vehicule number":null}';
		$this->description = 'Take train 78A from Madrid to Barcelona. Sit in seat 45B.';
		$this->descriptionJson = '"Take train 78A from Madrid to Barcelona. Sit in seat 45B."';
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

	public function testTransformStringToJson(): void
	{
		$this->assertEquals($this->descriptionJson, Formatter::transformStringToJson($this->description));
	}
}
