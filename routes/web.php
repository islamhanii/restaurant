<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\DishController;

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
Route::get('/chefs/show/{chef_id}', [ChefController::class, 'show']);
Route::get('/chefs/create', [ChefController::class, 'create']);
Route::post('/chefs/store', [ChefController::class, 'store']);
Route::get('/chefs/edit/{chef_id}', [ChefController::class, 'edit']);
Route::put('/chefs/update', [ChefController::class, 'update']);
Route::delete('/chefs/delete', [ChefController::class, 'delete']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/show/{category_id}', [CategoryController::class, 'show']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::get('/categories/edit/{category_id}', [CategoryController::class, 'edit']);
Route::put('/categories/update', [CategoryController::class, 'update']);
Route::delete('/categories/delete', [CategoryController::class, 'delete']);

Route::get('/dishes', [DishController::class, 'index']);
Route::get('/dishes/show/{dish_id}', [DishController::class, 'show']);
Route::get('/dishes/create', [DishController::class, 'create']);
Route::post('/dishes/store', [DishController::class, 'store']);
Route::get('/dishes/edit/{dish_id}', [DishController::class, 'edit']);
Route::put('/dishes/update', [DishController::class, 'update']);
Route::delete('/dishes/delete', [DishController::class, 'delete']);
