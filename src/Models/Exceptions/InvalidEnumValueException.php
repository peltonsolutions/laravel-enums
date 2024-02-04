<?php

namespace PeltonSolutions\LaravelEnums\Models\Exceptions;

class InvalidEnumValueException extends \Exception
{
	public function __construct(string $classname, string $key, $value)
	{
		parent::__construct("Invalid Enum Value for $classname::$key - ".$value);
	}

}