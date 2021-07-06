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


Route::get('login',[\App\Http\Controllers\Client\Web\Auth\LoginController::class,'index'])->name('login.index');
Route::post('login',[\App\Http\Controllers\Client\Web\Auth\LoginController::class,'login'])->name('login');

Route::get('register',[\App\Http\Controllers\Client\Web\Auth\RegisterController::class,'index'])->name('register.index');
Route::post('register',[\App\Http\Controllers\Client\Web\Auth\RegisterController::class,'register'])->name('register');

Route::get('password/reset/{token}',[\App\Http\Controllers\Client\Web\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset',[\App\Http\Controllers\Client\Web\Auth\ResetPasswordController::class,'reset'])->name('reset');

Route::get('forgot/password',[\App\Http\Controllers\Client\Web\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('forgot.password.email');
Route::post('forgot/password',[\App\Http\Controllers\Client\Web\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('forgot.password.send');

Route::view('privacy_policies', 'privacy_policies')->name('privacy_policies');

Route::get('/{id}/print','Admin\OrderController@printInvoice')->name('invoice.print')->middleware('signed');

//Route::view('login', 'front.auth.login-register');

Route::middleware('auth')->group(function (){
    Route::any('logout',[\App\Http\Controllers\Client\Web\Auth\LoginController::class,'logout'])->name('logout');
});

Route::get('/', [\App\Http\Controllers\Client\Web\HomeController::class, 'index'])->name('home');
Route::get('contact', [\App\Http\Controllers\Client\Web\ContactController::class, 'index'])->name('contact');
Route::get('shop', [\App\Http\Controllers\Client\Web\ShopController::class, 'index'])->name('shop');
Route::get('checkout', [\App\Http\Controllers\Client\Web\CheckoutController::class, 'index'])->name('checkout');
Route::get('cart', [\App\Http\Controllers\Client\Web\CartController::class, 'index'])->name('cart');
Route::get('product-details/{id}', [\App\Http\Controllers\Client\Web\ProductDetailController::class, 'show'])->name('product-details');
//
//Route::get('artisan', function (){
//    \Illuminate\Support\Facades\Artisan::call("migrate:fresh --seed");
//    return "done";
//});
//
//Route::get('migrate', function (){
//    \Illuminate\Support\Facades\Artisan::call("migrate");
//    return "done";
//});
//
//Route::get('install_passport', function (){
////    //\Illuminate\Support\Facades\Artisan::call("migrate");
////    \Illuminate\Support\Facades\Artisan::call("passport:install");
////    \Illuminate\Support\Facades\Artisan::call("passport:keys");
////    \Illuminate\Support\Facades\Artisan::call("passport:client --personal", ['--force' => true]);
//    \Illuminate\Support\Facades\Artisan::call("config:clear");
//    return "done";
//});
//
//Route::get('storage', function (){
//    \Illuminate\Support\Facades\Artisan::call("storage:link");
//    return "done";
//});

//Route::get('artisan', function (){
////    \Illuminate\Support\Facades\Artisan::call("migrate");
////    \Illuminate\Support\Facades\Artisan::call("passport:install");
//    \Illuminate\Support\Facades\Artisan::call("migrate");
//    \Illuminate\Support\Facades\Artisan::call("db:seed --class=InformationTableSeeder");
//    \Illuminate\Support\Facades\Artisan::call("config:clear");
//    return "done";
//});
