<?php

use App\Http\Controllers\Api\V1\Admin\BookingApiController;
use App\Http\Controllers\Api\V1\Admin\HotelApiController;
use App\Http\Controllers\Api\V1\Admin\LocationApiController;
use App\Http\Controllers\Api\V1\Admin\TourApiController;
use App\Http\Controllers\Api\V1\Admin\TourPackageApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;

use Illuminate\Support\Facades\Route;


// Users API Routes
Route::post('register', [UserApiController::class, 'registerNewUserAndCreateToken']);
Route::post('login', [UserApiController::class, 'loginAndCreateToken']);


Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::post('register', [UserApiController::class, 'registerNewUserAndCreateToken']);
    Route::post('userToken', [UserApiController::class, 'getToken']);
    Route::apiResource('users', UserApiController::class);

    // Booking
    Route::apiResource('bookings', BookingApiController::class);

    // Tour Package
    Route::apiResource('tour-packages', TourPackageApiController::class);

    // Tour
    Route::apiResource('tours', TourApiController::class);

    // Hotel
    Route::post('hotels/media', [HotelApiController::class, 'storeMedia'])->name('hotels.store_media');
    Route::apiResource('hotels', HotelApiController::class);

    // Location
    Route::post('locations/media', [LocationApiController::class, 'storeMedia'])->name('locations.store_media');
    Route::apiResource('locations', LocationApiController::class);
});
