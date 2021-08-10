<?php

namespace App\Providers;

use App\Models\Company;
use Illuminate\Support\ServiceProvider;

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
        view()->share('prefix', $this->getTenant() ?: '');
    }

    public function getTenant()
    {
        $company = Company::where('bd_hostname',request()->getHost())->first();
        return $company->domain;
    }
}
