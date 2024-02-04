<?php

namespace PeltonSolutions\LaravelEnums\Models;

abstract class NullableEnum extends Enum
{

	static public function validateValue(string|int|null $value): bool
	{
		return is_null($value) || parent::validateValue($value);
	}
}