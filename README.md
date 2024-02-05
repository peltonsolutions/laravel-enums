# laravel-enums

laravel-enums is a package by Pelton Solutions that allows Laravel developers to work easily with
enumerated values. Enums (short for 'enumerations') represent a set of named constants in your code. By introducing
enums, this package significantly enhances the readability and maintainability of your code.

In addition, you can optionally make your Enum fields nullable. To use this feature, simply have your Enum class extend
the `NullableEnum` class.

## Example:

```php
class ContentPageStatus extends \PeltonSolutions\LaravelEnums\Models\Enum
{
	const DRAFT = 'draft';
	const SCHEDULED = 'scheduled';
	const PUBLISHED = 'published';
	const ARCHIVED = 'archived';

	public static function map(): array
	{
		return [
			static::DRAFT => trans('content_page.statuses.draft'),
			static::SCHEDULED => trans('content_page.statuses.scheduled'),
			static::PUBLISHED => trans('content_page.statuses.published'),
			static::ARCHIVED => trans('content_page.statuses.archived'),
		];
	}
}
```

```php
class ContentPage extends Model
{
	protected $casts = [
		'status' => ContentPageStatus::class
	];
}
```

These examples demonstrate how you could use enumerations in a Laravel model. `ContentPageStatus` is an enumeration that
represents the possible status values that a `ContentPage` could have. The `ContentPage` model includes a casting to
this enumeration, enabling more robust input validation and a more explicit declaration of the possible 'status' values.
The package ensures value validation by throwing
a `\PeltonSolutions\LaravelEnums\Models\Exceptions\InvalidEnumValueException` exception if you try to set a value that
is not in the specified enumeration.

## Install

You can install the package via composer using the following command:

``` bash
composer require peltonsolutions/laravel-enums
```

## Testing

To ensure that laravel-enums is functioning correctly, you can run the package's tests using:

``` bash
composer test
```

### Security

If you discover any security-related issues, please
email [security@peltonsolutions.com](mailto:security@peltonsolutions.com) instead of using the issue tracker.

## Credits

- [Nathan Pelton](https://www.nathanpelton.com)

## License

laravel-enums is open-sourced software. It's licensed under the [MIT license](https://opensource.org/licenses/MIT),
which is a permissive license allowing the software to be used, modified, and shared.