<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ----------------------------------------Route ADMIN PAGE----------------------------------------
Route::prefix('adminpage')->middleware('auth','isAdmin')->group(function()
{

    //Dashboard route
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //Category route
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/Category', 'index');
        Route::get('/Category/create', 'create');
        Route::post('/Category', 'store');

        Route::get('/Category/{categorywithid}/edit', 'edit');
        Route::put('/Category/{categorywithid}','update');
    });

    //Brands route
    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);

    //Product route
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function ()
    {
        Route::get('/Products', 'index');
        Route::get('/Products/create', 'create');
        Route::post('/Products', 'store');
        Route::get('/Products/{product_with_ID}/edit', 'edit');

        Route::get('/Products/{product_with_ID}/delete', 'destroyProduct');

        Route::put('/Products/{product_with_ID}','updateProduct');
        Route::get('Products-Image/{product_image_id}/delete','destroyImage');
        Route::post('product-color/{prod_color_id}','updateProdQty');
        Route::get('product-color/{prod_color_id}/delete','deleteProdQtyColor');



    });

    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function ()
    {
        Route::get('/Colors', 'index');
        Route::get('/Colors/create', 'create');
        Route::post('/Colors/create', 'store_color');
        Route::get('/Colors/{color}/edit', 'edit_page_color');
        Route::put('/Colors/{color_id}', 'update_color');

        Route::get('/Colors/{color_id}/delete', 'destroycolor');


    });


});
