<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MumbaiController;


 
Route::get('/user', [UserController::class, 'index']);
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
    return view('welcome');
});

// login routes 
Route::post('/login', [Login::class, 'login']);

// create hotel by admin 
Route::post('/createhotel', [Login::class, 'createhotel'])->name('/createhotel');
// login and register routes 

Route::match(['get', 'post'], '/registeruser', [Login::class, 'register'])->name('registeruser');
Route::post('/loginuser', [Login::class, 'login_user'])->name('/loginuser');
Route::match(['get', 'post'], 'logout', [Login::class, 'logout'])->name('logout');

Route::get('homepage', function () {
    return view('ui.homepage');
})->name("homepage");

Route::get('bookmystay', function () {
    return view('ui.homepage');
})->name("bookmystay");

// mumbai hotels 
Route::match(['get', 'post'], '/mumbai-hotels', [LocationController::class, 'mumbai_hotels'])->name('/mumbai-hotels');

Route::match(['get', 'post'], '/searchmumbaihotels', [MumbaiController::class, 'searchmumbaihotels'])->name('/searchmumbaihotels');
Route::match(['get', 'post'], '/searchbyprice', [MumbaiController::class, 'SearchByPrice'])->name('/searchbyprice');
Route::match(['get', 'post'], '/pricefilter', [MumbaiController::class, 'SortByLowAndHigh'])->name('/pricefilter');
Route::match(['get', 'post'], '/checkAvailability', [MumbaiController::class, 'CheckAvailability'])->name('/checkAvailability');

