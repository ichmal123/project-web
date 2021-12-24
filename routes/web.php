<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

route::get('/self-market', [HomeController::class, 'redirect']);

route::get('/', [HomeController::class, 'index']);

route::get('/menuproduct', [HomeController::class, 'menuproduct']);

route::get('/product', [AdminController::class, 'product']);

route::get('/showproduct', [AdminController::class, 'showproduct']);

route::post('/uploadProduct', [AdminController::class, 'uploadProduct']);

route::post('/updateproduct/{id}', [AdminController::class, 'updateproduct']);

route::get('/search', [HomeController::class, 'search']);

route::get('/deleteproduct/{id}', [AdminController::class, 'deleteproduct']);

route::get('/updateview/{id}', [AdminController::class, 'updateview']);

route::post('/addcart/{id}', [HomeController::class, 'addcart']);