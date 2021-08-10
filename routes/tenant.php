<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    echo 'tenant';
});

Route::get('company/store', [CompanyController::class, 'store'])->name('company.store');
