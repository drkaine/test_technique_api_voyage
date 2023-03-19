<?php

declare(strict_types=1);

namespace models;

class Description
{
	public function __construct(public array $journeyList)
	{
	}

	public function getDescription(): array
	{
		return $this->createDescription();
	}

	public function createDescription(): array
	{
		$description = [];

		foreach ($this->journeyList as $boardingCard) {
			$description[] = $this->writeDescription($boardingCard);
		}

		$description[] = 'You have arrived at your final destination.';

		return $description;
	}

	private function writeDescription($boardingCard): string
	{
		$descriptionAdded = '';

		$airport = str_contains($boardingCard['to'], 'Airport') || str_contains($boardingCard['from'], 'Airport');

		if ($boardingCard['vehicule'] === 'flight') {
			$descriptionAdded .= 'From ' . $boardingCard['from'] . ', take ' . $boardingCard['vehicule'] . ' ' . $boardingCard['vehicule number'] . ' to ' . $boardingCard['to'] . '. Gate ' . $boardingCard['gate'] . ', seat ' . $boardingCard['seat'];
			$descriptionAdded .= $boardingCard['baggage'] !== 'auto' ? '. Baggage drop at ' . $boardingCard['baggage'] . '.' : '. Baggage will we automatically transferred from your last leg.';
		} elseif ($boardingCard['vehicule'] === 'bus' && $airport) {
			$descriptionAdded .= 'Take the airport ' . $boardingCard['vehicule'] . ' from ' . $boardingCard['from'] . ' to ' . $boardingCard['to'] . '. No seat assignment.';
		} else {
			$descriptionAdded .= 'Take ' . $boardingCard['vehicule'] . ' ' . $boardingCard['vehicule number'] . ' from ' . $boardingCard['from'] . ' to ' . $boardingCard['to'] . '. Sit in seat ' . $boardingCard['seat'] . '.';
		}

		return $descriptionAdded;
	}
}
