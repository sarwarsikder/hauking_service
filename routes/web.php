<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\backends\order\OrderController;
use App\Http\Controllers\backends\role\RoleController;
use App\Http\Controllers\backends\service\HaukingServiceController;
use App\Http\Controllers\backends\Settings\FrequencyController;
use App\Http\Controllers\backends\Settings\LanguageController;
use App\Http\Controllers\backends\Settings\PaymentController;
use App\Http\Controllers\backends\Settings\TaxController;
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

Route::get('/users/login', function () {
    return view('frontends.users.login');
});

Route::get('/users/forget-password', function () {
    return view('frontends.users.forget_password');
});

Route::get('/service', function () {
    return view('frontends.services.service');
});

Route::get('/service-list', function () {
    return view('frontends.services.service_list');
});

Route::get('/service/{service_id}', function () {
    return view('frontends.services.update_service');
});

Route::get('/users/registration', function () {
    return view('frontends.users.registration');
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
        Route::get('/users/update/{id}', [UserController::class, 'edit'])->name('users-edit');
        Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users-update');

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

        Route::group(['prefix' => 'settings'], function () {
            /**
             * Taxes
             */
            Route::get('/taxes', [TaxController::class, 'index'])->name('taxes-list');
            Route::get('/taxes/create', [TaxController::class, 'create'])->name('taxes-create');
            Route::post('/taxes/getState', [TaxController::class, 'getState'])->name('taxes-getState');
            Route::post('/taxes/getCity', [TaxController::class, 'getCity'])->name('taxes-getCity');
            Route::post('/taxes/store', [TaxController::class, 'store'])->name('taxes-submit');
            Route::get('/taxes/edit/{id}', [TaxController::class, 'edit'])->name('taxes-edit');
            Route::post('/taxes/{id}/update', [TaxController::class, 'update'])->name('taxes-update');
            Route::post('/taxes/status', [TaxController::class, 'updateStatus'])->name('taxes-status');
            Route::post('/taxes/delete', [TaxController::class, 'destroy'])->name('taxes-delete');


            /**
             * languages
             */
            Route::get('/languages', [LanguageController::class, 'index'])->name('languages-list');
            Route::get('/languages/create', [LanguageController::class, 'create'])->name('languages-create');
            Route::post('/languages/store', [LanguageController::class, 'store'])->name('languages-submit');
            Route::get('/languages/edit/{id}', [LanguageController::class, 'edit'])->name('languages-edit');
            Route::post('/languages/{id}/update', [LanguageController::class, 'update'])->name('languages-update');
            Route::post('/languages/status', [LanguageController::class, 'updateStatus'])->name('languages-status');
            Route::post('/languages/default', [LanguageController::class, 'updateDefault'])->name('languages-default');
            Route::post('/languages/delete', [LanguageController::class, 'destroy'])->name('languages-delete');


            /**
             * payments
             */
            Route::get('/payments', [PaymentController::class, 'index'])->name('payments-list');
            Route::put('/payments/update', [PaymentController::class, 'update'])->name('payments-update');

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

        /**
         * Roles
         */

        Route::group(['prefix' => 'hr'], function () {
            Route::resource('roles', RoleController::class);
            Route::resource('admins', AdminUserController::class);
        });
    });
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
