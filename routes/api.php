<?php

use App\Http\Controllers\Client\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[AuthController::class, 'login'])->name('login');
Route::post('register',[AuthController::class, 'register'])->name('register');

Route::post('forgot-password', 'ForgotPasswordController@store');
Route::post('code-confirmation', 'ForgotPasswordController@codeConfirmation');
Route::post('reset-password', 'ForgotPasswordController@resetPassword');


Route::resource('products','ProductController')->except(['store', 'edit', 'create', 'delete', 'update']);

Route::resource('categories','CategoryController')->except(['store', 'edit', 'create', 'delete', 'update']);
Route::resource('sub/categories','CategoryController')->except(['store', 'edit', 'create', 'delete', 'update']);

Route::resource('deliveries','DeliveryController')->except(['store', 'edit', 'create', 'delete', 'update']);

Route::middleware('auth:api')->group(static function(){
    Route::put('user','UserController@update')->name('user.update');
    Route::get('user','UserController@show')->name('user.show');

    Route::resource('orders','OrderController')->except(['edit', 'create', 'delete', 'update']);

    Route::resource('reviews','ReviewController')->except(['edit', 'create', 'update', 'index']);

    Route::resource('cart','CartController')->except(['edit', 'create', 'update', 'index', 'delete']);

});




Route::fallback(function () {
    $response = ['error' => 'Route not found'];
    return response($response, 404);
});
