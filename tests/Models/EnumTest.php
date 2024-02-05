<?php

use PeltonSolutions\LaravelEnums\Tests\Models\TestEnum;

it('allows valid value assignment', function () {
	$model = new class extends \Illuminate\Database\Eloquent\Model {
		protected $casts = [
			'field' => TestEnum::class
		];
	};

	$model->field = TestEnum::EXAMPLE2;
	$this->assertTrue(true);
});

it('throws exception when invalid value is assigned', function () {
	$model = new class extends \Illuminate\Database\Eloquent\Model {
		protected $casts = [
			'field' => TestEnum::class
		];
	};

	$this->expectException(\PeltonSolutions\LaravelEnums\Models\Exceptions\InvalidEnumValueException::class);
	$model->field = 'invalid_value';
});

it('returns null when calling an unset value', function () {
	$model = new class extends \Illuminate\Database\Eloquent\Model {
		protected $casts = [
			'field' => TestEnum::class
		];
	};

	$this->assertNull($model->field);
});

it('returned value === the Enum value', function () {
	$model = new class extends \Illuminate\Database\Eloquent\Model {
		protected $casts = [
			'field' => TestEnum::class
		];
	};

	$model->field = TestEnum::EXAMPLE2;
	$this->assertTrue($model->field === TestEnum::EXAMPLE2);
});