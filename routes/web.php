<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/login', function() {
//     return view('auth.login');
// });

// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class], 'login')->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth']], function() {
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    // Route::resource('users', App\Http\Controllers\AdminUserController::class);
    Route::prefix("/users")->group(function() {
        Route::get('/', [App\Http\Controllers\AdminUserController::class, 'index'])->name('admin-user');
        Route::get('/create', [App\Http\Controllers\AdminUserController::class, 'create'])->name('create-admin-user');
        Route::post('/', [App\Http\Controllers\AdminUserController::class, 'store'])->name('store-admin-user');
        Route::get('/show/{id}', [App\Http\Controllers\AdminUserController::class, 'show'])->name('show-admin-user');
        Route::post('/{id}', [App\Http\Controllers\AdminUserController::class, 'update'])->name('update-admin-user');
        Route::delete('/{id}', [App\Http\Controllers\AdminUserController::class, 'destroy']);
    });

    Route::prefix("/products")->group(function() {
        Route::get('/', [App\Http\Controllers\AdminProdutsController::class, 'index'])->name('admin-products');
        Route::post('/store', [App\Http\Controllers\AdminProdutsController::class, 'store'])->name('admin-store-products');
        Route::get('/edit/{id}', [App\Http\Controllers\AdminProdutsController::class, 'edit'])->name('admin-edit-products');
        Route::post('/update/{id}', [App\Http\Controllers\AdminProdutsController::class, 'update'])->name('admin-update-products');
        Route::delete('/delete/{id}', [App\Http\Controllers\AdminProdutsController::class, 'destroy'])->name('admin-destroy-products');
    });

    Route::prefix('/payments')->group(function() {
        Route::get('/', [App\Http\Controllers\AdminPaymentsController::class, 'index'])->name('admin-payments');
        Route::post('/', [App\Http\Controllers\AdminPaymentsController::class, 'store'])->name('admin-store-payments');
        Route::get('/edit/{id}', [App\Http\Controllers\AdminPaymentsController::class, 'edit'])->name('admin-edit-payments');
        Route::post('/update/{id}', [App\Http\Controllers\AdminPaymentsController::class, 'update'])->name('admin-update-payments');
        Route::delete('/delete/{id}', [App\Http\Controllers\AdminPaymentsController::class, 'destroy'])->name('admin-delete-payments');

    });

    Route::prefix('/customers')->group(function() {
        Route::get('/', [App\Http\Controllers\AdminCustomerController::class, 'index'])->name('admin-customers');
        Route::post('/', [App\Http\Controllers\AdminCustomerController::class, 'store'])->name('admin-store-customers');
        Route::get('/edit/{id}', [App\Http\Controllers\AdminCustomerController::class, 'edit'])->name('admin-edit-customers');
        Route::post('/update/{id}', [App\Http\Controllers\AdminCustomerController::class, 'update'])->name('admin-update-customers');
        Route::delete('/{id}', [App\Http\Controllers\AdminCustomerController::class, 'destroy'])->name('admin-delete-customers');
    });

    Route::prefix('/inventory_controls')->group(function() {
        Route::get('/', [App\Http\Controllers\AdminInventoryControlsController::class, 'index'])->name('admin-inventory_controls');
        Route::post('/', [App\Http\Controllers\AdminInventoryControlsController::class, 'store'])->name('admin-store-inventory_controls');
        Route::get('/edit/{id}', [App\Http\Controllers\AdminInventoryControlsController::class, 'edit'])->name('admin-edit-inventory_controls');
        Route::post('/update/{id}', [App\Http\Controllers\AdminInventoryControlsController::class, 'update'])->name('admin-update-inventory_controls');
        Route::delete('/{id}', [App\Http\Controllers\AdminInventoryControlsController::class, 'destroy'])->name('admin-delete-inventory_controls');
    });

    Route::prefix('/orders')->group(function() {
        Route::get('/', [App\Http\Controllers\AdminOrdersController::class, 'index'])->name('admin-orders');
        Route::post('/', [App\Http\Controllers\AdminOrdersController::class, 'store'])->name('admin-store-orders');
        Route::get('/edit/{id}', [App\Http\Controllers\AdminOrdersController::class, 'edit'])->name('admin-edit-order');
        Route::post('/update/{id}', [App\Http\Controllers\AdminOrdersController::class, 'update'])->name('admin-update-order');
        Route::delete('/{id}', [App\Http\Controllers\AdminOrdersController::class, 'destroy'])->name('admin-delete-order');
    });

    Route::prefix('/order_details')->group(function() {
        Route::get('/', [App\Http\Controllers\AdminOrderDetailsController::class, 'index'])->name('admin-order_details');
        Route::post('/', [App\Http\Controllers\AdminOrderDetailsController::class, 'store'])->name('admin-store-order_details');
        Route::get('/edit/{id}', [App\Http\Controllers\AdminOrderDetailsController::class, 'edit'])->name('admin-edit-order_details');
        Route::post('/update/{id}', [App\Http\Controllers\AdminOrderDetailsController::class, 'update'])->name('admin-update-order_details');
        Route::delete('/{id}', [App\Http\Controllers\AdminOrderDetailsController::class, 'destroy'])->name('admin-delete-order_details');
    });

    Route::prefix('/sales_report')->group(function() {
        Route::get('/', [App\Http\Controllers\AdminSalesReportController::class, 'index'])->name('admin-sales_report');
    });
});

Route::group(['prefix' => 'employee', 'middleware' => ['isEmployee', 'auth']], function() {
    Route::get('dashboard', 'EmployeeController@index');
});

Route::group(['prefix' => 'customer', 'middleware' => ['isCustomer', 'auth']], function() {
    Route::get('dashboard', 'CustomerController@index');
});
