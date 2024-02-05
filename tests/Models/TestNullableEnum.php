<?php

namespace PeltonSolutions\LaravelEnums\Tests\Models;

class TestNullableEnum extends \PeltonSolutions\LaravelEnums\Models\NullableEnum
{
	const EXAMPLE1 = 'example1';
	const EXAMPLE2 = 'example2';
	const EXAMPLE3 = 'example3';

	public static function map(): array
	{
		return [
			self::EXAMPLE1 => 'Example 1',
			self::EXAMPLE2 => 'Example 2',
			self::EXAMPLE3 => 'Example 3',
		];
	}
}
