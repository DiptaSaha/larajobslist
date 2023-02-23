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
Route::get('/listing/create', [ListingController::class,'create'])->name('listing.create');
Route::post('/listing', [ListingController::class,'store'])->name('listing.store');
//Show a Single Data
Route::get('/listing/{listing}',[ListingController::class,'show']);