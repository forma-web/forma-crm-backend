<?php

namespace App\Providers;

use App\Mail\Auth\EmailVerification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // TODO: define a method in another file
        Collection::macro('replaceByKey', function (mixed $key, callable $fn): Collection {
            $value = $this->get($key);
            return $this->replace([
                $key => $fn($value)
            ]);
        });

        // TODO: define a method in another file
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new EmailVerification($notifiable, $url))
                ->to($notifiable->email);
        });
    }
}
