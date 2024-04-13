<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Adminpanel\AdminController;
use  App\Http\Controllers\Vendorpanel\VendorController;
use  App\Http\Controllers\Customerpanel\CustomerController;
use  App\Http\Controllers\backend\DashboardController;
use  App\Http\Controllers\backend\{VendorCrudController,UserCrudController};

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard',[DashboardController::class,'dashboard'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin Routes

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('admin_dashboard');

    Route::resource('/vendorprofile',VendorCrudController::class);
    Route::resource('/userprofile',UserCrudController::class);
});

Route::prefix('admin')->group(function () {

    Route::post('/login-submit',[AdminController::class, 'login_submit'])->name('login_submit');
    Route::get('/logout',[AdminController::class, 'logout'])->name('admin_logout');
    Route::get('/login',[AdminController::class, 'login'])->name('admin_login');
    Route::get('/forget-password',[AdminController::class, 'forget_password'])->name('admin_forget_password');
    Route::post('/forget-password-submit',[AdminController::class, 'forget_password_submit'])->name('admin_forget_password_submit');

     Route::get('/reset-password/{token}/{email}',[AdminController::class, 'reset_password'])->name('admin_reset_password');

     Route::post('/reset-password-submit',[AdminController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

    Route::get('admin-approved-transactions',[AdminController::class,'admin_approved_transactions'])
    ->name('admin_approved_transactions');

    Route::get('admin-rejected-transactions',[AdminController::class,'admin_rejected_transactions'])
    ->name('admin_rejected_transactions');

    Route::get('admin-pending-transactions',[AdminController::class,'admin_pending_transactions'])
    ->name('admin_pending_transactions');

     Route::get('admin-transactions-approval-form/{id}',[AdminController::class,'admin_transactions_approval_form'])
    ->name('admin_transactions_approval_form');

    Route::post('admin-transactions-approval-form-submit',[AdminController::class,'admin_transactions_approval_form_submit'])
    ->name('admin_transactions_approval_form_submit');



});


//Vendor and Customer Routes

Route::middleware(['auth','role:customer'])->group(function () {
        Route::get('/customer/dashboard',[CustomerController::class,'index'])->name('customer.dashboard');
        //extra routes
        Route::get('vendorlist',[CustomerController::class,'vendorlist'])->name('customer_vendorlist');
        Route::get('vendorlist-form/{id}',[CustomerController::class,'vendorlist_form'])
        ->name('customer_vendorlist_form');
        Route::post('vendorlist-form-submit',[CustomerController::class,'vendorlist_form_submit'])
        ->name('customer_vendorlist_form_submit');


        //transactions
        Route::get('approved-transactions',[CustomerController::class,'approved_transactions'])
        ->name('customer_approved_transactions');

        Route::get('rejected-transactions',[CustomerController::class,'rejected_transactions'])
        ->name('customer_rejected_transactions');

        Route::get('pending-transactions',[CustomerController::class,'pending_transactions'])
        ->name('customer_pending_transactions');

        Route::get('customer-wallet-logs',[CustomerController::class,'customer_wallet_logs'])
        ->name('customer_wallet_logs');



    });


Route::middleware(['auth','role:vendor'])->group(function () {
    Route::get('/vendor/dashboard',[VendorController::class, 'index'])->name('vendor.dashboard');

        Route::get('vendor-approved-transactions',[VendorController::class,'vendor_approved_transactions'])
        ->name('vendor_approved_transactions');

        // Route::get('vendor-rejected-transactions',[VendorController::class,'vendor_rejected_transactions'])
        // ->name('vendor_rejected_transactions');


        // Route::get('vendor-pending-transactions',[VendorController::class,'vendor_pending_transactions'])
        // ->name('vendor_pending_transactions');

        Route::get('vendor-wallet-logs',[VendorController::class,'vendor_wallet_logs'])
        ->name('vendor_wallet_logs');
});





