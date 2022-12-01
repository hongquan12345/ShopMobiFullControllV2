<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\FrontEnd\CheckOutController;
use App\Http\Controllers\FrontEnd\OrderController;
use App\Http\Controllers\FrontEnd\WhistListController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::controller(App\Http\Controllers\FrontEnd\FrontEndController::class)->group(function ()
{
    Route::get('/', 'indexHomePage');
    Route::get('/home', 'indexHomePage');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'products_show');
});
Route::middleware(['auth'])->group(function()
{
    Route::get('/Whistlist',[WhistListController::class,'index']);
    Route::get('/Cart',[CartController::class,'index']);
    Route::get('/CheckOut',[CheckOutController::class,'index']);
    Route::get('/Orders',[OrderController::class,'index']);
    Route::get('/Orders/{orderID}',[OrderController::class,'showOrderID']);




});
    Route::get('/thank-you',[App\Http\Controllers\FrontEnd\FrontEndController::class, 'thankyou']);

// Route::controller(App\Http\Controllers\FrontEnd\WhistListController::class)->group(function ()
// {
//     Route::get('/Whistlist','index');
// });


// ----------------------------------------Route ADMIN PAGE----------------------------------------
Route::prefix('adminpage')->middleware('auth','isAdmin')->group(function()
{
    //Dashboard route
    Route::get('dashboard', [DashboardController::class, 'index']);
    //Admin Category route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/Category', 'index');
        Route::post('/Category', 'store');
        Route::get('/Category/create', 'create');
        Route::get('/Category/{categorywithid}/edit', 'edit');
        Route::put('/Category/{categorywithid}','update');
    });
    //Admin Brands route
    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);
    //Admin Product route
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
    //Admin Colors route
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function ()
    {
        Route::get('/Colors', 'index');
        Route::get('/Colors/create', 'create');
        Route::post('/Colors/create', 'store_color');
        Route::get('/Colors/{color}/edit', 'edit_page_color');
        Route::put('/Colors/{color_id}', 'update_color');
        Route::get('/Colors/{color_id}/delete', 'destroycolor');
    });

    //Admin Sliders route
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/Sliders', 'index');
        Route::get('Sliders/create', 'create');
        Route::post('/Sliders/create', 'store_sliders');
        Route::get('/Sliders/{slider_id}/edit', 'edit_slider');
        Route::put('/Sliders/{slider_id}', 'update_slider');
        Route::get('/Sliders/{slider_id}/delete', 'destroySlider');
    });
    //Admin Order route
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/Orders', 'index');
        Route::get('/Orders/{orderID}','show');


    });



});
