<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('user.dashboard');
});




Route::controller(\App\Http\Controllers\FrontEnd\ProductController::class)->group(function () {
    Route::get('/', 'index')->name('user.index');
    Route::get('/product', 'showProduct')->name('user.product');
    Route::get('/cart', 'showCart')->name('user.cart');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::controller(CategoryController::class)->group(function () {
        Route::get('admin/categories', 'index')->name('admin.categories.index');
        Route::get('admin/categories/create', 'create')->name('admin.categories.create');
        Route::post('admin/categories', 'store')->name('admin.categories.store');
    });

    Route::controller(BrandController::class)->group(function () {
       Route::get('admin/brands', 'index')->name('admin.brands.index');
       Route::get('admin/brands/create', 'create')->name('admin.brands.create');
       Route::post('admin/brands', 'store')->name('admin.brands.store');
       Route::get('admin/brands/{id}/edit', 'edit')->name('admin.brands.edit');
       Route::put('admin/brands/{id}', 'update')->name('admin.brands.update');
       Route::delete('admin/brands/{id}', 'destroy')->name('admin.brands.destroy');
    });

    Route::controller(ProductController::class)->group(function () {
       Route::get('admin/products', 'index')->name('admin.products.index');
       Route::get('admin/products/create', 'create')->name('admin.products.create');
       Route::post('admin/products', 'store')->name('admin.products.store');

       Route::get('admin/products/{id}/edit', 'edit')->name('admin.products.edit');
       Route::put('admin/products/{id}', 'update')->name('admin.products.update');
       Route::delete('admin/products/{id}', 'destroy')->name('admin.products.destroy');

       Route::get('admin/product/{id}/image', 'image')->name('admin.products.image');
       Route::post('admin/product/{id}/image', 'imageStore')->name('admin.products.image.store');
       Route::delete('admin/product/{id}/image', 'imageDestroy')->name('admin.products.image.destroy');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('checkout.index');
    });

    Route::controller(\App\Http\Controllers\OrderController::class)->group(function () {
        Route::get('/checkout', 'showCheckoutForm')->name('checkout.index');
        Route::post('/checkout/store', 'placeOrder')->name('checkout.placeOrder');
    });
});

require __DIR__.'/auth.php';
