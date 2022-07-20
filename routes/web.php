<?php

use App\Http\Controllers\backends\order\OrderController;
use App\Http\Controllers\backends\service\ServiceController;
use App\Http\Controllers\backends\service\SubService\ServiceOneController;
use App\Http\Controllers\backends\Settings\FrequencysController;
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
        Route::get('/users', [UserController::class, 'index'])->name('users');


        Route::get('/services', [ServiceController::class, 'index'])->name('service');
        Route::get('/serviceOne', [ServiceOneController::class, 'index'])->name('serviceOne');
        Route::get('/serviceTwo', [ServiceOneController::class, 'index'])->name('serviceTwo');
        Route::get('/orders', [OrderController::class, 'index'])->name('order');
        Route::get('/subscriber', [SubscriberController::class, 'index'])->name('subscriber');
        Route::get('/frequencys', [FrequencysController::class, 'index'])->name('frequencys');
        Route::get('/taxSystem', [TaxSystemController::class, 'index'])->name('taxSystem');
    });
});



