<?php

declare(strict_types=1);

namespace models;

require_once './autoload.php';

class Runner
{
	public string $result;

	public function __construct(string $informationsJson)
	{
		$informationsArray = $this->informationsJsonToArray($informationsJson);

		$boardingCardsList = $this->createBoarddingCardsList($informationsArray);

		$journey = $this->instanceJourney($boardingCardsList);

		$journey->sortBoardingCardList();

		$boardingCardsListSorted = $journey->boardingCardListSorted;

		$description = new Description($boardingCardsListSorted);

		$descriptionArray = $description->getDescription();

		$descriptionJson = $this->getDescriptionOnJsonFormat($descriptionArray);

		$this->result = $descriptionJson;
	}

	private function informationsJsonToArray(string $informationsJson): array
	{
		return Formatter::transformJsonToArray($informationsJson);
	}

	private function createBoarddingCardsList(array $informationsArray): array
	{
		$boardingCardsList = [];

		foreach ($informationsArray as $informations) {
			$boardingCardsList[] = $this->instanceBoardingCard($informations);
		}

		return $boardingCardsList;
	}

	private function instanceBoardingCard(array $informations): BoardingCard
	{
		return new BoardingCard($informations[0]);
	}

	private function instanceJourney(array $boardingCardsList): Journey
	{
		return new Journey($boardingCardsList);
	}

	private function getDescriptionOnJsonFormat(array $descriptionArray): string
	{
		$descriptionJson = '';

		foreach ($descriptionArray as $descriptionString) {
			$descriptionJson .= Formatter::transformStringToJson($descriptionString);
		}

		return $descriptionJson;
	}
}
