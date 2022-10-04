<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Collection::macro('replaceByKey', function (string $key, callable $fn): Collection
        {
            /** @var Collection $this */
            $value = $this->get($key);

            return $this->replace([
                $key => $fn($value)
            ]);
        });
    }
}
