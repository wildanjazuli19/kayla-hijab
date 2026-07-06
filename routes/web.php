<?php

use Illuminate\Support\Facades\Route;

use App\Models\Product;

/*
|--------------------------------------------------------------------------
| FRONTEND CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CheckoutController;
/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| SHOP
|--------------------------------------------------------------------------
*/

Route::get('/shop', function () {

    $products = Product::latest()->get();

    return view('shop', compact('products'));

})->name('shop');

/*
|--------------------------------------------------------------------------
| PRODUCT DETAIL
|--------------------------------------------------------------------------
*/

Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product.show');

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

/*
|--------------------------------------------------------------------------
| WISHLIST
|--------------------------------------------------------------------------
*/

Route::get('/wishlist', function () {

    $products = Product::latest()->get();

    return view('wishlist', compact('products'));

})->name('wishlist');

/*
|--------------------------------------------------------------------------
| STATIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/new-arrival', function () {

    $products = Product::latest()->get();

    return view('new-arrival', compact('products'));

})->name('new-arrival');

Route::get('/best-seller', function () {

    $products = Product::latest()->get();

    return view('best-seller', compact('products'));

})->name('best-seller');

Route::view('/about', 'about')
    ->name('about');

Route::view('/contact', 'contact')
    ->name('contact');

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', function () {

        return view('profile.dashboard');

    })->name('profile.dashboard');

});

/*
|--------------------------------------------------------------------------
| DASHBOARD REDIRECT
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    return redirect()->route('profile.dashboard');

})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */

    Route::get('/products', [AdminProductController::class, 'index'])
        ->name('admin.products');

    Route::get('/products/create', [AdminProductController::class, 'create'])
        ->name('admin.products.create');

    Route::post('/products/store', [AdminProductController::class, 'store'])
        ->name('admin.products.store');

    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])
        ->name('admin.products.edit');

    Route::put('/products/{id}', [AdminProductController::class, 'update'])
        ->name('admin.products.update');

    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])
        ->name('admin.products.destroy');

    /*
    |--------------------------------------------------------------------------
    | CATEGORIES
    |--------------------------------------------------------------------------
    */

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('admin.categories');

    Route::get('/categories/create', [CategoryController::class, 'create'])
        ->name('admin.categories.create');

    Route::post('/categories/store', [CategoryController::class, 'store'])
        ->name('admin.categories.store');

    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])
        ->name('admin.categories.edit');

    Route::put('/categories/{id}', [CategoryController::class, 'update'])
        ->name('admin.categories.update');

    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
        ->name('admin.categories.destroy');

     });

    Route::get('/product/{slug}', [ProductController::class, 'show'])
     ->name('product.show');


    Route::get('/checkout', function () {
     return view('checkout');
     })->name('checkout');

    Route::get('/checkout', [CheckoutController::class, 'index'])
     ->name('checkout');

    Route::post('/checkout/process', [CheckoutController::class, 'process'])
     ->name('checkout.process');
/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';