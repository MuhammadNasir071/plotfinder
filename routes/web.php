<?php

use App\Http\Controllers\Agency\AgencyController;
use App\Http\Controllers\Agency\AgencyPropertyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/', [IndexController::class, 'index'])->name('frontend.index');
Route::get('/property/{id}/details', [IndexController::class, 'propertyDetails'])->name('frontend.property.details');
Route::get('/property/categories/{id}', [IndexController::class, 'propertyCategory'])->name('frontend.categories');
Route::post('/property/search', [IndexController::class, 'searchProperty'])->name('frontend.search.property');
Route::get('/contactus', [IndexController::class, 'contactUs'])->name('frontend.contactUs');
Route::post('/contactus_save', [IndexController::class, 'contactUsSave'])->name('frontend.contactUs.save');


Auth::routes();
Route::get('/verify_otp', [RegisterController::class, 'verifyOTP'])->name('verifyOTP');
Route::get('/verify/email', [RegisterController::class, 'verifyEmail'])->name('verifyEmail');
Route::post('/check_otp', [RegisterController::class, 'check_otp'])->name('checkOTP');
Route::post('/save_resend_otp', [RegisterController::class, 'save_resend_otp'])->name('saveOTP');
Route::post('/forgot_password', [RegisterController::class, 'forgot_password'])->name('forgotPassword');
Route::get('/reset_password', [RegisterController::class, 'reset_password'])->name('resetPassword');
Route::Post('/save_reset_password', [RegisterController::class, 'save_reset_password'])->name('saveResetPassword');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// START: Backend Routs
Route::middleware(['auth'])->group(function ()
{
    Route::prefix('admin')->name('admin.')->group(function()
    {
        Route::get('index', [AdminController::class, 'index'])->name('dashboard');
        Route::get('view_profile/{id}', [AdminController::class, 'viewProfile'])->name('view.profile');
        Route::get('edit_profile/{id}', [AdminController::class, 'editProfile'])->name('edit.profile');
        Route::put('update_profile/{id}', [AdminController::class, 'updateProfile'])->name('update.profile');

        Route::get('properties', [PropertyController::class, 'index'])->name('index.property');
        Route::get('create_property', [PropertyController::class, 'create'])->name('add.property');
        Route::post('store_property', [PropertyController::class, 'store'])->name('store.property');
        Route::get('show_property/{id}', [PropertyController::class, 'show'])->name('show.property');
        Route::get('edit_property/{id}', [PropertyController::class, 'edit'])->name('edit.property');
        Route::put('update_property/{id}', [PropertyController::class, 'update'])->name('update.property');
        Route::delete('delete_property/{id}', [PropertyController::class, 'delete'])->name('delete.property');

        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('user_show/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('user_edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('user_update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('user_delete/{id}', [UserController::class, 'delete'])->name('users.delete');

        Route::get('contactus/message', [AdminController::class, 'contactusMessage'])->name('contactus.message');
        Route::get('contactus/message/{id}', [AdminController::class, 'contactusMessageDelete'])->name('delete.message');
    });
});

// START: Agency Routs
Route::middleware(['auth'])->group(function ()
{
    Route::prefix('agency')->name('agency.')->group(function()
    {
        Route::get('dashboard', [AgencyController::class, 'dashboard'])->name('dashboard');
        Route::get('view_profile/{id}', [AgencyController::class, 'viewProfile'])->name('view.profile');
        Route::get('edit_profile/{id}', [AgencyController::class, 'editProfile'])->name('edit.profile');
        Route::put('update_profile/{id}', [AgencyController::class, 'updateProfile'])->name('update.profile');

        Route::get('property', [AgencyPropertyController::class, 'index'])->name('property.index');
        Route::get('property/create', [AgencyPropertyController::class, 'create'])->name('property.create');
        Route::post('property/store', [AgencyPropertyController::class, 'store'])->name('property.store');
        Route::get('property/show/{id}', [AgencyPropertyController::class, 'show'])->name('property.show');
        Route::get('property/edit/{id}', [AgencyPropertyController::class, 'edit'])->name('property.edit');
        Route::put('property/update/{id}', [AgencyPropertyController::class, 'update'])->name('property.update');
        Route::delete('property/delete/{id}', [AgencyPropertyController::class, 'delete'])->name('property.delete');
    });
});
