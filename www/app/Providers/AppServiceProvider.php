<?php

namespace App\Providers;

use App\Models\Categoriables;
use App\Models\Category;
use App\Models\Images;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\Post;
use App\Observers\PostObserver;
use App\Observers\CategoryObserver;
use App\Observers\ImagesObserver;

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
            'posts' => Post::class,
            'images' => Images::class,
            'categories' => Category::class,
            'categoriables' => Categoriables::class
        ]);
        Post::observe(PostObserver::class);
        Category::observe(CategoryObserver::class);
        Images::observe(ImagesObserver::class);
    }
}
