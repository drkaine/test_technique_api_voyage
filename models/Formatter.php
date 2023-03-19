<?php

declare(strict_types=1);

namespace models;

class Formatter
{
	public static function transformJsonToArray(string $json): mixed
	{
		$array = json_decode($json, true);

		return $array;
	}

	public static function transformStringToJson(string $string): string
	{
		return json_encode($string);
	}
}
