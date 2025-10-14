<?php
namespace App\Providers;

use App\Models\Subject;
use App\Models\TutorQuestion;
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
        View::composer('layouts.main_frontend', function ($view) {
            // if (auth()->check()) {
                $questions = TutorQuestion::where('user_id', auth()->id())
                    ->latest()
                    ->take(10)
                    ->get();
            // }
            $view->with('questions', $questions);

        });

          View::composer('*', function ($view) {
        $view->with('subjects', Subject::all());
    });

        // View::composer('*', function ($view) {
        //     Log::info('View composer is working!');
        // });
    }
}
