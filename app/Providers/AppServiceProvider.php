<?php

namespace App\Providers;

use App\Models\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();







        view()->composer(
            'admin.includes.notifications',
            function ($view) {
                $unseen_messages = Request::where('seen', 0)
                ->join('users', 'users.id', '=', 'requests.user')
                ->select('requests.*', 'users.name as username', 'users.image as user_image')
                ->orderBy('id', 'DESC')->get();

                $view->with('unseen_messages', $unseen_messages);
            }
        );
        //
    }
}
