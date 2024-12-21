<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
 
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

Route::get('/ui', function () {
    return view('ui.homepage');
})->name("/ui");

