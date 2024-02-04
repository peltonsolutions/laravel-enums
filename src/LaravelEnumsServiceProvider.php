<?php

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelEnumsServiceProvider extends ServiceProvider
{
	public function register(): void
	{
		$this->mergeConfigFrom(
			__DIR__.'/../config/config.php', 'content-manager'
		);
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/../config/config.php' => config_path('content-manager.php'),

			__DIR__.'/../Controllers/ContentController.php' => app_path('Http/Controllers/ContentController.php'),
			__DIR__.'/../Controllers/ContentSectionController.php' => app_path('Http/Controllers/ContentSectionController.php'),

			__DIR__.'/../database/seeders/ContentSectionSeeder.php' => $this->app->databasePath('seeders/ContentSectionSeeder.php'),

			__DIR__.'/../database/factories/PeltonSolutions/FilamentContentManager' => $this->app->databasePath('factories/PeltonSolutions/FilamentContentManager'),

			__DIR__.'/../resources/views' => resource_path('views/vendor/content-manager'),
			__DIR__.'/../resources/lang' => $this->app->langPath('vendor/content-manager'),
		]);

		Blade::componentNamespace('PeltonSolutions\\FilamentContentManager\\View\\Components', 'content-manager');

		$this->loadMigrationsFrom(__DIR__.'/../database/migrations');

		$this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'content-manager');

		$this->loadViewsFrom(__DIR__.'/../resources/views', 'content-manager');

		$this->loadRoutesFrom(__DIR__.'/routes.php');

		//Blade::component('content-manager-snippet', AlertComponent::class);

		AboutCommand::add('My Package - Test', fn() => ['Version' => '1.0.0']);

		/*$this->callAfterResolving(BladeCompiler::class, function ($blade) {
			BladeExtension::register($blade);
		});*/
	}
}