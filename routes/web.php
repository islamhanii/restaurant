<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChefController;

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
    return view('index');
});

Route::get('/chefs', [ChefController::class, 'index']);
Route::get('/chefs/create', [ChefController::class, 'create']);
Route::post('/chefs/store', [ChefController::class, 'store']);