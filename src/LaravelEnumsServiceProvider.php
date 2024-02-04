<?php

namespace PeltonSolutions\LaravelEnums;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;

class LaravelEnumsServiceProvider extends ServiceProvider
{
	public function register(): void
	{

	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		AboutCommand::add('My Package - Test', fn() => ['Version' => '1.0.0']);
	}
}