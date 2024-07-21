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
        $location = ContactUs::first()->location;

        View::share('phone', $phone);
        View::share('location', $location);
        View::share('program_categories', ProgramsCategory::withCount('programs')->get());
    }
}
