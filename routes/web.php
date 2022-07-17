<?php

use App\Http\Controllers\Dashbroad\OrderController;
use App\Http\Controllers\Dashbroad\ServiceController;
use App\Http\Controllers\Dashbroad\Settings\FrequencysController;
use App\Http\Controllers\Dashbroad\Settings\TaxSystemController;
use App\Http\Controllers\Dashbroad\SubscriberController;
use App\Http\Controllers\Dashbroad\SubService\ServiceOneController;
use App\Http\Controllers\Dashbroad\UserController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'admin'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/service', [ServiceController::class, 'index'])->name('service');

    Route::get('/serviceOne', [ServiceOneController::class, 'index'])->name('serviceOne');


    Route::get('/serviceTwo', [ServiceOneController::class, 'index'])->name('serviceTwo');


    Route::get('/users', [UserController::class, 'index'])->name('users');


    Route::get('/order', [OrderController::class, 'index'])->name('order');


    Route::get('/subscriber', [SubscriberController::class, 'index'])->name('subscriber');


    Route::get('/frequencys', [FrequencysController::class, 'index'])->name('frequencys');


    Route::get('/taxSystem', [TaxSystemController::class, 'index'])->name('taxSystem');
});

