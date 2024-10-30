<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Customer\MainCustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ContactSubmissionController;
use App\Http\Controllers\Customer\AppointmentController as CustomerAppointmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer/home', [MainCustomerController::class, 'index'])
    ->middleware(['auth', 'rolemiddleware:customer'])
    ->name('customer.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified','rolemiddleware:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::post('/categories', 'store')->name('categories.store');
        Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
        Route::put('/categories/{category}', 'update')->name('categories.update');
        Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users', 'store')->name('users.store');
        Route::get('/users/{id}/edit', 'edit')->name('users.edit');
        Route::put('/users/{id}', 'update')->name('users.update');
        Route::delete('/users/{id}', 'destroy')->name('users.destroy');
        Route::get('/users/{id}', 'show')->name('users.show');
    });

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/product-history/', [ProductController::class, 'showProductHistory'])->name('products.history');

    Route::controller(AppointmentController::class)->group(function () {
        Route::get('/appointments/step-one', 'showStepOne')->name('appointments.step-one');
        Route::post('/appointments/step-one', 'storeStepOne')->name('appointments.step-one.post');

        Route::get('/appointments/step-two', 'showStepTwo')->name('appointments.step-two');
        Route::post('/appointments/step-two', 'storeStepTwo')->name('appointments.step-two.post');

        Route::get('/appointments/step-three', 'showStepThree')->name('appointments.step-three');
        Route::post('/appointments/step-three', 'storeStepThree')->name('appointments.step-three.post');

        Route::get('/appointments/confirmation', 'showConfirmation')->name('appointments.confirmation');
        Route::post('/appointments/confirmation', 'storeConfirmation')->name('appointments.confirmation.post');

        Route::get('appointments/index', 'index')->name('appointments.index');
        Route::get('appointments/{appointment}', 'show');
        Route::get('appointments/{appointment}/edit', 'edit')->name('appointments.edit');
        Route::post('/appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
    });
});

Route::middleware('auth', 'verified', 'rolemiddleware:customer')->group(function () {
    Route::controller(CustomerAppointmentController::class)->group(function () {
        Route::get('/customer/appointments/step-one', 'showStepOne')->name('customer.appointments.step-one');
        Route::post('/customer/appointments/step-one', 'storeStepOne')->name('customer.appointments.step.one.post');

        Route::get('/customer/appointments/step-two', 'showStepTwo')->name('customer.appointments.step-two');
        Route::post('/customer/appointments/step-two', 'storeStepTwo')->name('customer.appointments.step-two.post');

        Route::get('/customer/appointments/step-three', 'showStepThree')->name('customer.appointments.step-three');
        Route::post('/customer/appointments/step-three', 'storeStepThree')->name('customer.appointments.step.three.post');

        Route::get('/customer/appointments/confirmation', 'showConfirmation')->name('customer.appointments.confirmation');
        Route::post('/customer/appointments/confirmation', 'storeConfirmation')->name('customer.appointments.confirmation.post');

        Route::get('/customer/appointments/index', 'index')->name('customer.appointments.index');
        Route::get('/customer/appointments/{appointment}', 'show')->name('customer.appointments.show');
    });
});

Route::post('/contact', [ContactSubmissionController::class, 'send'])->name('contact.send');

require __DIR__ . '/auth.php';
