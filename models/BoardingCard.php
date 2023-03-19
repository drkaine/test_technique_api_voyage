<?php

declare(strict_types=1);

namespace models;

class BoardingCard
{
	public string $vehicule;

	public string $from;

	public string $to;

	public ?string $seat;

	public ?string $gate;

	public ?string $baggage;

	public ?string $vehiculeNumber;

	public function __construct(array $informations)
	{
		$this->vehicule = $informations['vehicule'];
		$this->from = $informations['from'];
		$this->to = $informations['to'];
		$this->seat = $informations['seat'];
		$this->gate = $informations['gate'];
		$this->baggage = $informations['baggage'];
		$this->vehiculeNumber = $informations['vehicule number'];
	}
}
