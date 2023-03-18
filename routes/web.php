<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
Route::get('/', [ PostController::class, 'index' ]);
Route::get('auto/make/{id}', [ PostController::class, 'makes' ])->name('auto.make');
Route::get('auto/count/{id}/{id2}', [ PostController::class, 'count' ])->name('auto.count');
