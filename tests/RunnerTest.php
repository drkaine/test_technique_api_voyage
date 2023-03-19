<?php

declare(strict_types=1);

namespace tests;

use models\Runner;
use PHPUnit\Framework\TestCase;

require_once './autoload.php';

class RunnerTest extends TestCase
{
	private string $descriptionWanted;

	private string $informationsJson;

	protected function setUp(): void
	{
		parent::setUp();

		$this->descriptionWanted = '"Take train 78A from Madrid to Barcelona. Sit in seat 45B.""Take the airport bus from Barcelona to Gerona Airport. No seat assignment.""From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.""From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will we automatically transferred from your last leg.""You have arrived at your final destination."';

		$this->informationsJson = '{"0":[{"vehicule":"flight","from":"Stockholm","to":"New York JFK","seat":"7B","gate":"22","baggage":"auto","vehicule number":"SK22"}],"1":[{"vehicule":"train","from":"Madrid","to":"Barcelona","seat":"45B","vehicule number":"78A"}],"2":[{"vehicule":"flight","from":"Gerona Airport","to":"Stockholm","seat":"3A","gate":"45B","baggage":"ticket counter 344","vehicule number":"SK455"}],"3":[{"vehicule":"bus","from":"Barcelona","to":"Gerona Airport","vehicule number":null}]}';
	}

	public function testRunner(): void
	{
		$runner = new Runner($this->informationsJson);

		$this->assertEquals($this->descriptionWanted, $runner->result);
	}
}
