<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Faq;
use App\Models\Pengaduan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path().'/Helpers/helpers.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $countkritiksaran = Faq::where('status', 0)->count();
            $countpengaduan = Pengaduan::where('status', 0)->count();
            $view->with('countkritiksaran', $countkritiksaran);
            $view->with('countpengaduan', $countpengaduan);
        });
    }
}
