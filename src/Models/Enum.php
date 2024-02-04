<?php

namespace PeltonSolutions\LaravelEnums\Models;

use Illuminate\Contracts\Database\Eloquent\Castable;

abstract class Enum implements Castable
{
	static public function validateValue(string|int|null $value): bool
	{
		return isset(static::map()[$value]);
	}

	abstract public static function map(): array;

	public static function castUsing(array $arguments)
	{
		return EnumCaster::class;
	}
}