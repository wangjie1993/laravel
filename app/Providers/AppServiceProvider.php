<?php

namespace App\Providers;

use App\Models\Comment;
use App\Observers\CommentObserver;
use App\Observers\UserObserver;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //解决Mysql版本低
        Schema::defaultStringLength(191);
        //注册观察者
        User::observe(UserObserver::class);
        Comment::observe(CommentObserver::class);

        //中文时间
        Carbon::setLocale('zh');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        //
    }
}
