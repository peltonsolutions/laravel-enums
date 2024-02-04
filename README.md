# laravel-enums

`composer require peltonsolutions/laravel-enums`

## Example:

```
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

```
class ContentPage extends Model
{
	protected $casts = [
		'status' => ContentPageStatus::class
	];
}
```

It throws a `\PeltonSolutions\LaravelEnums\Models\Exceptions\InvalidEnumValueException` exception if you attempt to set
a value that is not in the map array.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
