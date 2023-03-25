<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PaypalController;
// use App\Http\Controllers\StripePaymentController;
// use App\Models\System;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\ProviderController;
// use App\Http\Controllers\ProductController;

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
Route::post('/payment/paypal', [PaypalController::class, 'payment'])->name('payment.pay');


Route::get('/admin', [LoginController::class, 'index'])->name('login.index');
Route::post('/admin', [LoginController::class, 'validate_data'])->name('login.validate_data');

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->name('admin');

// Route::prefix('admin')->group(function () {
// });
// Route::resource('clients', ClientController::class)->names('clients');  
// Route::resource('products', ProductController::class)->names('products');  
// Route::resource('providers', ProviderController::class)->names('providers');  
// Route::resource('purchases', PurchaseController::class)->names('purchases');    
// Route::resource('sales', SaleController::class)->names('sales');    


// o

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->action([LoginController::class, 'index']);
    })->name('logout');

    Route::prefix('admin')->group(function () {
        
        // Users
        Route::get('dashboard', [AdminController::class, 'index']);
        Route::resource('users', UserController::class)->names('users');
        Route::resource('clients', ClientController::class)->names('clients');
        Route::resource('categories', CategoryController::class)->names('categories');
        Route::resource('subCategories', SubCategoryController::class)->names('subCategories');
        Route::resource('collections', CollectionController::class)->names('collections');
        Route::resource('products', ProductController::class)->names('products');
        Route::resource('systems', SystemController::class)->names('systems');
        Route::post('systems/update', [SystemController::class, 'updatepaypal'])->name('systems.updatepaypal');

        Route::resource('blogs', BlogController::class)->names('blogs');
        // Route::get('stripe', [StripePaymentController::class, 'stripeGet'])->name('stripes.get');
        // Route::get('stripe', [StripePaymentController::class, 'stripePost'])->name('stripes.post');

    });
});
