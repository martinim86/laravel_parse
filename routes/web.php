<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;
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

// Route::get('/', function () {
//     return 'Hello World';
// });
Route::get('/', [ AutoController::class, 'index' ])->name('index');
Route::get('auto/make/{id}', [ AutoController::class, 'makes' ])->name('auto.make');
Route::get('auto/count/{id}/{id2}', [ AutoController::class, 'count' ])->name('auto.count');
Route::get('auto/stat/', [ AutoController::class, 'stat' ])->name('auto.stat');
Route::post('auto/stat/', [ AutoController::class, 'stat' ])->name('auto.filter');
