<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QueueController;
use App\Http\Controllers\RedisController;

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

Route::get('/redis/set/{key}/{value}', [RedisController::class, 'setKey']);
Route::get('/redis/get/{key}', [RedisController::class, 'getKey']);
Route::get('/redis/delete/{key}', [RedisController::class, 'deleteKey']);
Route::get('/redis/cacheKey/{key}', [RedisController::class, 'cacheKey']);

Route::get('/jobs/testQueue', [QueueController::class, 'testQueue']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
