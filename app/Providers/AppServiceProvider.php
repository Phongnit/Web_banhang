<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\ServiceProvider;
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
        Paginator::useBootstrap();
        view()->composer('*',function ($view){
            $categories = ProductCategory::where('status','1')->get();
            $brands = Brand::where('status','1')->get();
            $view->with([
                'categories'=>$categories,
                'brands'=>$brands
            ]);
        });
    }
}
