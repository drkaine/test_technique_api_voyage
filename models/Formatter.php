<?php

declare(strict_types=1);

namespace models;

class Formatter
{
	public static function transformJsonToArray(string $json): array
	{
		return json_decode($json, true);
	}

	public static function transformArrayToJson(array $array): string|false
	{
		if (!self::isGoodArray($array)) {
			return false;
		}

		return json_encode($array);
	}

	public static function isGoodArray(array $array): bool
	{
		return array_reduce(array_keys($array), function ($result, $key) {
			return $result && is_string($key);
		}, true);
	}
}
