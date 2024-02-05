<?php

namespace PeltonSolutions\LaravelEnums\Models;

use Illuminate\Contracts\Database\Eloquent\Castable;

abstract class Enum implements Castable
{
	public static function castUsing(array $arguments)
	{
		return EnumCaster::class;
	}

	public function validateValue($value): bool
	{
		return isset($this::map()[$value]);
	}

	abstract public static function map(): array;
}