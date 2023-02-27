<?php

use App\Http\Controllers\ListingController;
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
Route::get('/listings/create', [ListingController::class,'create'])->name('listing.create');
Route::post('/listings', [ListingController::class,'store'])->name('listing.store');
//Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit']);
Route::put('/listings/{listing}',[ListingController::class,'update']);

Route::delete('/listings/{listing}',[ListingController::class,'destroy']);
//Show a Single Data
Route::get('/listings/{listing}',[ListingController::class,'show']);
