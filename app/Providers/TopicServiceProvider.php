<?php

namespace App\Providers;

use App\Contracts\TopicContract;
use App\Models\Topic;
use App\Repositories\TopicRepository;
use Illuminate\Support\ServiceProvider;

class TopicServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TopicContract::class, function ($app) {
            return new TopicRepository(
                $this->app->make(Topic::class)
            );
        });
    }
}
