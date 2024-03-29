<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/logout', function(){return redirect('/');});

Route::middleware(['auth:sanctum','admin','verified'])->get('/dashboard',function(){
    return view('dashboard');
})->name('dashboard');


Route::get('/redirect', [HomeController::class , 'redirect'])->middleware('auth', 'verified');

Route::get('/users', [AdminController::class, 'users']);

Route::get('/users/delete/{id}', [AdminController::class, 'user_delete']);

Route::get('/foods', [AdminController::class, 'show_foods']);

Route::get('foods/add', [AdminController::class, 'foods']);

Route::post('/foods/add', [AdminController::class, 'add_food']);

Route::get('/foods/delete/{id}', [AdminController::class, 'delete_food']);

Route::get('/food/edit/{id}', [AdminController::class, 'edit_food']);

Route::post('/food/edit/{id}', [AdminController::class, 'update_food']);

Route::get('/reservations', [AdminController::class, 'reservations']);

Route::get('/reservations/delete/{id}', [AdminController::class, 'delete_reservations']);

Route::get('/reservations/confirm/{id}', [AdminController::class, 'confirm_reservation']);

Route::get('/chefs', [AdminController::class, 'show_chefs']);

Route::get('/chefs/add', [AdminController::class, 'add_chef']);

Route::post('/chefs/add', [AdminController::class, 'upload_chefs']);

Route::get('/chefs/delete/{id}', [AdminController::class, 'delete_chef']);

Route::get('/chef/edit/{id}', [AdminController::class, 'edit_chef']);

Route::post('/chef/edit/{id}', [AdminController::class, 'update_chef']);

Route::get('/reviews', [AdminController::class, 'show_reviews']);

Route::get('/reviews/delete/{id}', [AdminController::class, 'delete_review']);


Route::get('/auth/google', [HomeController::class, 'googlepage']);

Route::get('/auth/google/callback', [HomeController::class, 'googlecallback']);

Route::get('/reservation', [HomeController::class , 'reservation']);

Route::post('/reservation', [HomeController::class, 'add_reservation']);

Route::get('/reservation/delete/{id}', [HomeController::class, 'delete_reservation']);

Route::post('/reviews/add', [HomeController::class , 'add_review']);

Route::get('test', [HomeController::class, 'test_view']);

Route::post('/contact', [HomeController::class, 'post_contact']);
