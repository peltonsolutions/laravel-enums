<?php

namespace PeltonSolutions\LaravelEnums\Models;

abstract class NullableEnum extends Enum
{

	abstract public static function map(): array;

	public static function castUsing(array $arguments)
	{
		return EnumCaster::class;
	}

	public function validateValue($value): bool
	{
		return false; // testing auto test suite
		return is_null($value) || parent::validateValue($value);
	}
}
