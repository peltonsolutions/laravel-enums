<?php

namespace PeltonSolutions\LaravelEnums\Models;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use PeltonSolutions\LaravelEnums\Models\Exceptions\InvalidEnumValueException;

class EnumCaster implements CastsAttributes
{

	/**
	 * @throws InvalidEnumValueException
	 */
	public function get(Model $model, string $key, mixed $value, array $attributes)
	{
		if (!isset($attributes[$key])) {
			return;
		}
		if (!isset($model->getCasts()[$key])) {
			return $value;
		}

		$enum = $model->getCasts()[$key];
		if ((new $enum)->validateValue($value)) {
			return $value;
		}
		throw new InvalidEnumValueException(get_class($model), $key, $value);
	}

	/**
	 * @throws InvalidEnumValueException
	 */
	public function set(Model $model, string $key, mixed $value, array $attributes)
	{
		$enum = $model->getCasts()[$key];
		if ((new $enum)->validateValue($value)) {
			return $value;
		}
		throw new InvalidEnumValueException(get_class($model), $key, $value);
	}
}