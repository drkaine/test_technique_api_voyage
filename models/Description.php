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
		$description = [];

		foreach ($this->journeyList as $boardingCard) {
			$descriptionAdded = '';

			if ($boardingCard['vehicule'] === 'flight') {
				$descriptionAdded .= 'From ' . $boardingCard['from'] . ', take ' . $boardingCard['vehicule'] . ' ' . $boardingCard['vehicule number'] . ' to ' . $boardingCard['to'] . '. Gate ' . $boardingCard['gate'] . ', seat ' . $boardingCard['seat'];
				$descriptionAdded .= $boardingCard['baggage'] !== 'auto' ? '. Baggage drop at ' . $boardingCard['baggage'] . '.' : '. Baggage will we automatically transferred from your last leg.';
			} elseif ($boardingCard['vehicule'] === 'bus') {
				if (str_contains($boardingCard['to'], 'Airport') || str_contains($boardingCard['from'], 'Airport')) {
					$descriptionAdded .= 'Take the airport ' . $boardingCard['vehicule'] . ' from ' . $boardingCard['from'] . ' to ' . $boardingCard['to'] . '. No seat assignment.';
				}
			} else {
				$descriptionAdded .= 'Take ' . $boardingCard['vehicule'] . ' ' . $boardingCard['vehicule number'] . ' from ' . $boardingCard['from'] . ' to ' . $boardingCard['to'] . '. Sit in seat ' . $boardingCard['seat'] . '.';
			}
			$description[] = $descriptionAdded;
		}

		$description[] = 'You have arrived at your final destination.';

		return $description;
	}
}
