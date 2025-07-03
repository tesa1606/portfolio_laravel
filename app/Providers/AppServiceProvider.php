<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Contact;

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
        // Kirim variabel 'contact' hanya ke view front-end/home
        View::composer('front-end.home', function ($view) {
            $contact = Contact::where('status_publish', 1)->first();
            $view->with('contact', $contact);
        });
    }
}
