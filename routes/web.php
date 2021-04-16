<?php

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

Route::get('', [\App\Http\Controllers\Admin\AuthController::class, 'create']);


Route::get('artisan', function (){
    \Illuminate\Support\Facades\Artisan::call("migrate:fresh --seed");
    return "done";
});

Route::get('migrate', function (){
    \Illuminate\Support\Facades\Artisan::call("migrate");
    return "done";
});

Route::get('install_passport', function (){
//    //\Illuminate\Support\Facades\Artisan::call("migrate");
//    \Illuminate\Support\Facades\Artisan::call("passport:install");
//    \Illuminate\Support\Facades\Artisan::call("passport:keys");
//    \Illuminate\Support\Facades\Artisan::call("config:clear");
    \Illuminate\Support\Facades\Artisan::call("passport:client --personal");

    return "done";
});

Route::get('storage', function (){
    \Illuminate\Support\Facades\Artisan::call("storage:link");
    return "done";
});

//Route::get('artisan', function (){
//    \Illuminate\Support\Facades\Artisan::call("migrate");
//    \Illuminate\Support\Facades\Artisan::call("passport:install");
//    return "done";
//});
