<?php

namespace App\Providers;

use App\Models\ContactUs;
use App\Models\ProgramsCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $phone = ContactUs::first()->phone;
        $phone_link = preg_replace('/\D/', '', $phone);
        if (strpos($phone_link, '0') === 0) {
            $phone_link = preg_replace('/^0/', '+62', $phone_link);
        }
        $location = ContactUs::first()->location;

        View::share('phone', $phone);
        View::share('phone_link', $phone_link);
        View::share('location', $location);
        View::share('program_categories', ProgramsCategory::withCount('programs')->get());
    }
}
