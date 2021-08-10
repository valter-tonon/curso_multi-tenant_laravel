<?php

use App\Models\Company;
use App\Models\Theme;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function ()  {
    $theme = Theme::where('is_active', 1)->first();
    $theme = $theme? $theme->name:'default';
    return view("$theme.index");
});

