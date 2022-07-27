<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\RestaurantController;

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

Route::get('/', [RestaurantController::class, 'index'])->name('restaurant.home');


/*============================== ADMIN Login ================================*/
Route::get('/admin/login', [AuthController::class, 'loginPage'])->name('login')->middleware('not-auth');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.store');

Route::middleware('auth')->prefix('/admin')->group(function() {
    /*============================== ADMIN Main ================================*/
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [OverviewController::class, 'index'])->name('overview');

    /*============================== ADMIN Chefs ================================*/
    Route::prefix('/chefs')->group(function(){
        Route::get('/', [ChefController::class, 'index'])->name('chefs');
        Route::get('/show/{chef_id}', [ChefController::class, 'show'])->name('chef.show');
        Route::get('/create', [ChefController::class, 'create'])->name('chef.create');
        Route::post('/store', [ChefController::class, 'store'])->name('chef.store');
        Route::get('/edit/{chef_id}', [ChefController::class, 'edit'])->name('chef.edit');
        Route::put('/update', [ChefController::class, 'update'])->name('chef.update');
        Route::delete('/delete', [ChefController::class, 'delete'])->name('chef.delete');
    });
    
    /*============================== ADMIN Categories ================================*/
    Route::prefix('/categories')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('categories');
        Route::get('/show/{category_id}', [CategoryController::class, 'show'])->name('category.show');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{category_id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/delete', [CategoryController::class, 'delete'])->name('category.delete');
    });
    
    /*============================== ADMIN Dishes ================================*/
    Route::prefix('/dishes')->group(function(){
        Route::get('/', [DishController::class, 'index'])->name('dishes');
        Route::get('/show/{dish_id}', [DishController::class, 'show'])->name('dish.show');
        Route::get('/create', [DishController::class, 'create'])->name('dish.create');
        Route::post('/store', [DishController::class, 'store'])->name('dish.store');
        Route::get('/edit/{dish_id}', [DishController::class, 'edit'])->name('dish.edit');
        Route::put('/update', [DishController::class, 'update'])->name('dish.update');
        Route::delete('/delete', [DishController::class, 'delete'])->name('dish.delete');
    });
    
    /*============================== ADMIN Contacts ================================*/
    Route::prefix('/contacts')->group(function(){
        Route::get('/', [ContactController::class, 'index'])->name('contacts');
        Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
        Route::delete('/delete', [ContactController::class, 'delete'])->name('contact.delete');
    });
    
    /*============================== ADMIN Informations ================================*/
    Route::prefix('/informations')->group(function(){
        Route::get('/', [InformationController::class, 'index'])->name('informations');
        Route::get('/create', [InformationController::class, 'create'])->name('information.create');
        Route::post('/store', [InformationController::class, 'store'])->name('information.store');
        Route::get('/edit/{dish_id}', [InformationController::class, 'edit'])->name('information.edit');
        Route::put('/update', [InformationController::class, 'update'])->name('information.update');
        Route::delete('/delete', [InformationController::class, 'delete'])->name('information.delete');
    });
});
