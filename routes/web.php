<?php

use App\Http\Controllers\backends\order\OrderController;
use App\Http\Controllers\backends\service\HaukingServiceController;
use App\Http\Controllers\backends\service\SubService\ServiceOneController;
use App\Http\Controllers\backends\Settings\FrequencyController;
use App\Http\Controllers\backends\Settings\LanguageController;
use App\Http\Controllers\backends\Settings\PaymentController;
use App\Http\Controllers\backends\Settings\TaxController;
use App\Http\Controllers\backends\Settings\TaxSystemController;
use App\Http\Controllers\backends\SubscriberController;
use App\Http\Controllers\backends\user\UserController;
use App\Http\Controllers\Settings\CouponsController;
use Illuminate\Support\Facades\Route;

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
    return view('backends.dashboard.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['prefix' => 'admin'], function () {
    Route::middleware(['auth', 'admin'])->group(function () {

        /**
         * Users
         */
        Route::get('/users', [UserController::class, 'index'])->name('users-list');
        Route::get('/users/create', [UserController::class, 'create'])->name('users-create');
        Route::post('/users/create', [UserController::class, 'store'])->name('users-submit');
        Route::post('/users/status', [UserController::class, 'updateStatus'])->name('users-status');
        Route::post('/users/delete', [UserController::class, 'destroy'])->name('users-delete');


        Route::group(['prefix' => 'settings'], function () {
            /**
             * Taxes
             */
            Route::get('/taxes', [TaxController::class, 'index'])->name('taxes-list');
            Route::get('/taxes/create', [TaxController::class, 'create'])->name('taxes-create');


            /**
             * Taxes
             */
            Route::get('/languages', [LanguageController::class, 'index'])->name('languages-list');
            Route::get('/languages/create', [LanguageController::class, 'create'])->name('languages-create');


            /**
             * Taxes
             */
            Route::get('/payments', [PaymentController::class, 'index'])->name('payments-list');
            Route::get('/payments/create', [LanguageController::class, 'create'])->name('payments-create');

            /**
             * Frequency
             */

            Route::get('/frequencys', [FrequencyController::class, 'index'])->name('frequency');
            Route::post('/frequency/create', [FrequencyController::class, 'create'])->name('frequecy-create');
            Route::post('/frequency/status', [FrequencyController::class, 'updateStatus'])->name('frequency-status');
            Route::post('/frequency/delete', [FrequencyController::class, 'destroy'])->name('frequency-delete');
            Route::post('/frequency/update', [FrequencyController::class, 'update'])->name('frequency-update');



            /**
             * Coupons
             */

            Route::get('/coupons', [CouponsController::class, 'index'])->name('coupons-list');
            Route::get('/coupons/create', [CouponsController::class, 'create'])->name('coupons-create');
            Route::post('/coupons/store', [CouponsController::class, 'store'])->name('coupons-submit');
            Route::get('/coupons/edit/{id}', [CouponsController::class, 'edit'])->name('coupons-edit');
            Route::post('/coupons/{id}/update', [CouponsController::class, 'update'])->name('coupons-update');
            Route::post('/coupons/status', [CouponsController::class, 'updateStatus'])->name('coupons-status');
            Route::post('/coupons/delete', [CouponsController::class, 'destroy'])->name('coupons-delete');

        });


        Route::get('/services', [HaukingServiceController::class, 'index'])->name('service-list');
        Route::get('/orders', [OrderController::class, 'index'])->name('order-list');
        Route::get('/subscriber', [SubscriberController::class, 'index'])->name('subscriber');
    });
});



