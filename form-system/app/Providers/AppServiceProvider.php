<?php

namespace App\Providers;

use App\Validators\DateOfBirthValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::resolver(function ($translator, $data, $rules, $messages) {
            return new DateOfBirthValidator($translator, $data, $rules, $messages);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
