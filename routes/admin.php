<?php


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('login',[AuthController::class, 'create'])->name('login.form');
Route::post('login',[AuthController::class, 'store'])->name('login');

Route::middleware('auth:admin')->group(static function(){

    Route::post('logout',[AuthController::class, 'destroy'])->name('logout');
    Route::resource('users','UserController')
        ->except(['edit','update','create','store']);

    Route::get('sub/categories','CategoryController@index')->name('categories.sub.index');
    Route::get('sub/categories/create','CategoryController@create')->name('categories.sub.create');
    Route::get('sub/categories/{category}/edit','CategoryController@edit')->name('categories.sub.edit');
    Route::resource('categories','CategoryController')
        ->except('show');

    Route::resource('banners','BannerController')
        ->except('show');

    //Route::post('products/multiple/destroy','ProductController@multipleDelete')->name('products.multiple.destroy');
    Route::resource('products','ProductController');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('orders','OrderController')
        ->except('store', 'create');

//    Route::prefix('order')->as('orders.')->group(static function (){
//        Route::get('/','OrderController@index')->name('index');
//        Route::put('/{id}','OrderController@update')->name('update');
//        Route::get('/{id}/edit','OrderController@edit')->name('edit');
////        Route::get('/last','OrderController@latest')->name('last');
//        Route::get('/{id}','OrderController@show')->name('show');
//        Route::get('/{id}/print','OrderController@printInvoice')->name('invoice.print');
//
//    });

    Route::resource('deliveries','DeliveryController')->except(['destroy', 'update', 'create', 'edit']);

//    Route::prefix('settings')->as('settings.')->group(static function (){
////        Route::post('/','SettingController@update')->name('update');
////        Route::get('/','SettingController@shipping')->name("shipping");
//
//    });
});
