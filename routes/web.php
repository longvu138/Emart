<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Brand;
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




// Route Frontend
Route::get('/', [IndexController::class, 'home'])->name('home');

// Product-cat
Route::get('product-cat/{slug}', [IndexController::class, 'productCategory'])->name('product.category');

// Product-detail 
Route::get('product-detail/{slug}', [IndexController::class, 'productDetail'])->name('product.detail');

// user.auth
Route::get('users/auth', [IndexController::class, 'userAuth'])->name('user.auth');
Route::post('user/login', [IndexController::class, 'loginSubmit'])->name('login.submit');
Route::post('user/register', [IndexController::class, 'registerSubmit'])->name('register.submit');
Route::get('user/logout',  [IndexController::class, 'userLogout'])->name('user.logout');






Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Backend
// admin 
Route::group(['prefix' => 'admin/', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [AdminController::class, 'admin'])->name('admin');

    // Banner Section
    Route::resource('/banner', BannerController::class);
    Route::post('banner_status', [BannerController::class, 'bannerStatus'])->name('banner.status');

    // categoris Section
    Route::resource('/category', CategoryController::class);
    Route::post('category_status', [CategoryController::class, 'categoryStatus'])->name('category.status');
    Route::post('category/{id}/child', [CategoryController::class, 'getChildByParentID']);

    // Brand Section
    Route::resource('/brand', BrandController::class);
    Route::post('brand_status', [BrandController::class, 'brandStatus'])->name('brand.status');

    // product Section
    Route::resource('/product', ProductController::class);
    Route::post('product_status', [ProductController::class, 'productStatus'])->name('product.status');

    // user Section
    Route::resource('/user', UserController::class);
    Route::post('user_status', [UserController::class, 'userStatus'])->name('user.status');
});


// seller 
Route::group(['prefix' => 'seller/', 'middleware' => ['auth', 'seller']], function () {
    // Route::get('/', [AdminController::class, 'admin'])->name('seller');
    Route::get('/', function () {
        return 'view seller n??';
    })->name('seller');
});
