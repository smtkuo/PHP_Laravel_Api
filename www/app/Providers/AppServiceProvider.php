<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\Post;
use App\Observers\PostObserver;
use App\Observers\CategoryObserver;
 
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
        Relation::morphMap([
            'posts' => 'App\Post',
            'categories' => 'App\Category'
        ]);
        Post::observe(PostObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
