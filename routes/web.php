<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

//Show All Listings Data
Route::get('/', [ListingController::class,'index']);

//Show Create to  Listings Form
Route::get('/listings/create', [ListingController::class,'create'])->name('listing.create')->middleware('auth');
Route::post('/listings', [ListingController::class,'store'])->name('listing.store')->middleware('auth');
//Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');
//Listing Manage Listing
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');
//Show a Single Data
Route::get('/listings/{listing}',[ListingController::class,'show']);

//Show User Register
Route::get('/register',[UserController::class,'create'])->middleware('guest');
Route::post('/users',[UserController::class,'store']);
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/users/authenticate',[UserController::class,'authenticate']);
