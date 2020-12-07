<?php

namespace App\Providers;

use App\Blogapi\Repository\Contracts\EloquentRepositoryInterface; 
use App\Blogapi\Repository\Contracts\CategoryRepositoryInterface;
use App\Blogapi\Repository\CommentRepository;
use App\Blogapi\Repository\Contracts\CommentInterface;
use App\Blogapi\Repository\Contracts\PostInterface;
use App\Blogapi\Repository\Eloquent\CategoryRepository; 
use App\Blogapi\Repository\Eloquent\BaseRepository;
use App\Blogapi\Repository\PostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostInterface::class, PostRepository::class);
        $this->app->bind(CommentInterface::class, CommentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class); 
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
          
        

    }
}
