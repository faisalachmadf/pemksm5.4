<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('date_range', function ($attribute, $value, $parameters, $validator) {
            $format = $parameters[0];
            $date = explode(' - ', $value);
            $startDate = Carbon::createFromFormat($format, $date[0]);
            $endDate = Carbon::createFromFormat($format, $date[1]);

            return ($startDate && $startDate->format($format) == $date[0]) && ($endDate && $endDate->format($format) == $date[1]);
        }, 'The :attribute does not match the format :format.');

        Validator::replacer('date_range', function($message, $attribute, $rule, $parameters) {
            return str_replace(':format', $parameters[0], $message);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
