<?php

namespace App\Providers;

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\News;

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
    public function boot()
    {
        View::composer('news.*', function ($view) {
            $view->with([
                'categories' => Category::all(),
                'news' => News::with('category')->latest()->paginate(10)
            ]);
        });

        // Method 1: Using the event system (recommended for newer Voyager versions)
        Voyager::addAction(\App\Actions\RegistrationsAction::class);

        // Alternative Method: If you're using a version that supports menu hooks
        // This would typically be in your VoyagerServiceProvider, not AppServiceProvider
        /*
        Voyager::hooks()->addHook('voyager.menu.display', function ($menu) {
            $menuItem = $menu->items->where('title', 'Events Management')->first();
            if ($menuItem) {
                $menuItem->children->add([
                    'route' => 'voyager.event-registrations.index',
                    'title' => 'Registrations',
                    'icon' => 'voyager-people',
                    'order' => 2
                ]);
            }
        });
        */
    }
}