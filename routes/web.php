<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
use App\Http\Controllers\HistoryOrderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// admin page
//
// banner crud show or hide
// profit
// user who buy the most
// product most sell
// product less sell
// filter product by date

// user
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/product/history-order', [HistoryOrderController::class, 'index'])->name('product.history.order');

Route::get('/product/shopping-cart', [ControllersProductController::class, 'getCart'])->name('product.shopping.cart');
Route::get('/product/checkout', [ControllersProductController::class, 'checkoutView'])->name('product.checkout.index')->middleware(['auth', 'role:user']);
Route::get('/product/checkout/{checkout}', [ControllersProductController::class, 'checkoutShow'])->name('product.checkout.show')->middleware(['auth', 'role:user']);
Route::get('/product/{product}', [ControllersProductController::class, 'show'])->name('product.show');
Route::get('/product/cart/{product}', [ControllersProductController::class, 'addToCart'])->name('product.cart');
Route::post('/product/checkout/checkout-type', [ControllersProductController::class, 'checkoutType'])->name('product.checkout.type')->middleware(['auth', 'role:user']);
Route::post('/product/checkout/cash', [ControllersProductController::class, 'cashSingleProduct'])->name('product.checkout.single.cash')->middleware(['auth', 'role:user']);
Route::post('/product/checkout/cashProduct', [ControllersProductController::class, 'cashProduct'])->name('product.checkout.cash')->middleware(['auth', 'role:user']);

Route::get('/success', [PayPalController::class, 'success'])->middleware(['auth', 'role:user']);
Route::get('/error', [PayPalController::class, 'error'])->middleware(['auth', 'role:user']);
Route::get('/single-success', [PayPalController::class, 'singleSuccess'])->middleware(['auth', 'role:user']);
Route::get('/single-error', [PayPalController::class, 'singleError'])->middleware(['auth', 'role:user']);
Route::post('/product/checkout/paypalProduct', [PayPalController::class, 'pay'])->name('product.checkout.paypal')->middleware(['auth', 'role:user']);
Route::post('/product/checkout/paypal', [PayPalController::class, 'paySingle'])->name('product.checkout.single.paypal')->middleware(['auth', 'role:user']);

Route::get('product/category/{category}', [ControllersCategoryController::class, 'index'])->name('category.index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/product', ProductController::class);
    Route::resource('/banner', BannerController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
