<?php

use App\Http\Controllers\backends\order\OrderController;
use App\Http\Controllers\backends\service\HaukingServiceController;
use App\Http\Controllers\backends\service\SubService\ServiceOneController;
use App\Http\Controllers\backends\Settings\FrequencyController;
use App\Http\Controllers\backends\Settings\TaxSystemController;
use App\Http\Controllers\backends\SubscriberController;
use App\Http\Controllers\backends\user\UserController;
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
        Route::get('/users', [UserController::class, 'index'])->name('users-list');
        Route::get('/users/create', [UserController::class, 'create'])->name('users-create');
        Route::post('/users/create', [UserController::class, 'store'])->name('users-submit');
        Route::post('/users/status', [UserController::class, 'updateStatus'])->name('users-status');
        Route::post('/users/delete', [UserController::class, 'destroy'])->name('users-delete');

        /**
         * Frequency start
         */

        Route::get('/frequencys', [FrequencyController::class, 'index'])->name('frequency');
        Route::post('/frequency/create', [FrequencyController::class, 'create'])->name('frequecy-create');
        Route::post('/frequency/status', [FrequencyController::class, 'updateStatus'])->name('frequency-status');
        Route::post('/frequency/delete', [FrequencyController::class, 'destroy'])->name('frequency-delete');
        Route::post('/frequency/update', [FrequencyController::class, 'update'])->name('frequency-update');
        /**
         * Frequency end
         */

        /**
        * Service start
        */
        Route::get('/services', [HaukingServiceController::class, 'index'])->name('service-list');
        Route::get('/services/create', [HaukingServiceController::class, 'create'])->name('service-create');
        Route::post('/services/create', [HaukingServiceController::class, 'store'])->name('service-submit');
        /**
        * Service end
        */
        Route::get('/orders', [OrderController::class, 'index'])->name('order-list');
        Route::get('/subscriber', [SubscriberController::class, 'index'])->name('subscriber');
        
        Route::get('/taxSystem', [TaxSystemController::class, 'index'])->name('taxSystem');
    });
});



