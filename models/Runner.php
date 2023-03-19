<?php

declare(strict_types=1);

namespace models;

require_once './autoload.php';

class Runner
{
	public string $result;

	public function __construct(string $informationsJson)
	{
		$this->result = $this->getDescriptionJson($informationsJson);
	}

	private function getDescriptionJson(string $informationsJson): string
	{
		$descriptionArray = $this->getDescriptionsArray($informationsJson);

		$descriptionJson = $this->getDescriptionOnJsonFormat($descriptionArray);

		return $descriptionJson;
	}

	private function getDescriptionsArray(string $informationsJson): array
	{
		$boardingCardsListSorted = $this->getBoardingsCardListSorted($informationsJson);

		$description = new Description($boardingCardsListSorted);

		$descriptionArray = $description->getDescription();

		return $descriptionArray;
	}

	private function getBoardingsCardListSorted(string $informationsJson): array
	{
		$boardingCardsList = $this->getBoardingsCardList($informationsJson);

		$journey = $this->instanceJourney($boardingCardsList);

		$journey->sortBoardingCardList();

		$boardingCardsListSorted = $journey->boardingCardListSorted;

		return $boardingCardsListSorted;
	}

	private function getBoardingsCardList(string $informationsJson): array
	{
		$informationsArray = $this->informationsJsonToArray($informationsJson);

		$boardingCardsList = $this->createBoarddingCardsList($informationsArray);

		return $boardingCardsList;
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
