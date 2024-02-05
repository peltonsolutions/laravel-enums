<?php

namespace PeltonSolutions\LaravelEnums\Tests\Models;

class TestEnum extends \PeltonSolutions\LaravelEnums\Models\Enum
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
