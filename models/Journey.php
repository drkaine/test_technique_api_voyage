<?php

declare(strict_types=1);

namespace models;

class Journey
{
	public function __construct(public array $boardingCardListNotSorted)
	{
	}

	public array $boardingCardListSorted;

	public function sortBoardingCardList(): void
	{
		$boardingCardList = $this->transformBoardingCardObjectOnArray();

		$boardingCardListFrom = array_column($boardingCardList, 'from');
		$boardingCardListTo = array_column($boardingCardList, 'to');

		$startJourney = array_values(array_diff($boardingCardListFrom, $boardingCardListTo))[0];
		$endJourney = array_values(array_diff($boardingCardListTo, $boardingCardListFrom))[0];

		$boardingCardListFrom = array_combine($boardingCardListFrom, $boardingCardList);

		$this->boardingCardListSorted[] = $boardingCardListFrom[$startJourney];

		while ($boardingCardListFrom[$startJourney]['to'] !== $endJourney) {
			$this->boardingCardListSorted[] = $boardingCardListFrom[$boardingCardListFrom[$startJourney]['to']];
			$startJourney = $boardingCardListFrom[$startJourney]['to'];
		}
	}

	public function transformBoardingCardObjectOnArray(): array
	{
		$boardingCardList = [];

		foreach ($this->boardingCardListNotSorted as $boardingCard) {
			$boardingCardList[] = [
				'vehicule'        => $boardingCard->vehicule,
				'from'            => $boardingCard->from,
				'to'              => $boardingCard->to,
				'seat'            => $boardingCard->seat,
				'gate'            => $boardingCard->gate,
				'baggage'         => $boardingCard->baggage,
				'vehicule number' => $boardingCard->vehiculeNumber,
			];
		}

		return $boardingCardList;
	}
}
