<?php

declare(strict_types=1);

namespace models;

class Formatter
{
	public static function transformJsonToArray(string $json): array
	{
		return json_decode($json, true);
	}

	public static function transformArrayToJson(array $array): string
	{
		return json_encode($array);
	}
}
