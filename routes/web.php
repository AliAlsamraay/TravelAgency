<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\TourPackageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Booking
    Route::resource('bookings', BookingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Tour Package
    Route::resource('tour-packages', TourPackageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Tour
    Route::resource('tours', TourController::class, ['except' => ['store', 'update', 'destroy']]);

    // Hotel
    Route::post('hotels/media', [HotelController::class, 'storeMedia'])->name('hotels.storeMedia');
    Route::resource('hotels', HotelController::class, ['except' => ['store', 'update', 'destroy']]);

    // Location
    Route::post('locations/media', [LocationController::class, 'storeMedia'])->name('locations.storeMedia');
    Route::resource('locations', LocationController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
